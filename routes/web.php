<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes - DZ Motoshop
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Halaman Awal (Landing Page) & Dashboard User
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $produkTerbaru = Product::all();
    return view('dashboard', compact('produkTerbaru'));
})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Authentication (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Menu User / Informasi
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Katalog Produk User
    Route::resource('products', ProductController::class);

    // Halaman Tentang Kami & Kontak
    Route::view('/tentang-kami', 'about')->name('about');
    Route::view('/kontak', 'contact')->name('contact');
});


/*
|--------------------------------------------------------------------------
| Keranjang (Session Based)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // 1. Menampilkan Halaman Keranjang
    Route::get('/keranjang', function () {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    })->name('cart');

    Route::get('/cart', function () {
        return redirect()->route('cart');
    });

    // 2. Tambah produk ke keranjang
    Route::post('/keranjang/add', function (Request $request) {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id'          => $product->id,
                'nama_produk' => $product->nama_produk,
                'harga'       => $product->harga,
                'gambar'      => $product->gambar,
                'kategori'    => $product->kategori ?? 'Aksesoris',
                'quantity'    => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    })->name('cart.add');

    // 3. Update Jumlah Produk (+ / -)
    Route::patch('/keranjang/update/{id}', function (Request $request, $id) {
        $cart = session()->get('cart', []);
        $type = $request->input('type');

        if (isset($cart[$id])) {
            if ($type === 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($type === 'decrease') {
                $cart[$id]['quantity']--;
                if ($cart[$id]['quantity'] <= 0) {
                    unset($cart[$id]);
                }
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    })->name('cart.update');

    // 4. Hapus Item dari Keranjang
    Route::delete('/keranjang/remove/{id}', function ($id) {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart')->with('success', 'Produk dihapus dari keranjang!');
    })->name('cart.remove');

});


/*
|--------------------------------------------------------------------------
| Checkout / Pemesanan & Pengemasan
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // 1. Form Checkout
    Route::match(['get', 'post'], '/checkout', [CheckoutController::class, 'index'])->name('checkout');

    // 1.1 Rute Tambahan: Beli Sekarang (Direct Buy-Now dari Halaman Detail Produk)
    Route::post('/checkout/buy-now', function (Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        // Simpan data pembelian langsung (buy now) ke session terpisah
        session()->put('buy_now', [
            'id'          => $product->id,
            'nama_produk' => $product->nama_produk,
            'harga'       => $product->harga,
            'gambar'      => $product->gambar,
            'kategori'    => $product->kategori ?? 'Aksesoris',
            'quantity'    => $quantity
        ]);

        // Arahkan langsung ke halaman checkout
        return redirect()->route('checkout');
    })->name('checkout.buy-now');

    // 2. Proses Pemesanan
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // 3. Halaman Status Pesanan (Dikemas / Packed)
    Route::get('/order/packed', [CheckoutController::class, 'packed'])->name('order.packed');
    Route::get('/packed', [CheckoutController::class, 'packed']);
    
    // Redirect /pesanan-saya langsung ke halaman packed
    Route::get('/pesanan-saya', function() {
        return redirect()->route('order.packed');
    })->name('user.orders');
});


/*
|--------------------------------------------------------------------------
| Profile (Admin & User)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Menu Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);
        
        // Kelola Pesanan Admin
        Route::get('orders', [AdminController::class, 'orders'])->name('orders.index');
        Route::patch('orders/{id}', [AdminController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        
        // Route Hapus Pesanan Admin (Mengarah ke OrderController@destroy)
        Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

    });