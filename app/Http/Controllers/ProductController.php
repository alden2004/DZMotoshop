<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // PERUBAHAN: Import Facade Storage untuk menghapus/mengelola berkas file

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Halaman Produk
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $products = Product::all(); //

        // kalau akses admin
        if (request()->is('admin/products')) { //
            return view(
                'admin.products.index',
                compact('products')
            ); //
        }

        // kalau akses user
        return view(
            'products.index',
            compact('products')
        ); //
    }

    /*
    |--------------------------------------------------------------------------
    | Form Tambah Produk Admin
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view(
            'admin.products.create'
        ); //
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Produk
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // PERUBAHAN: Menyesuaikan aturan validasi agar mendukung berkas gambar asli
        $request->validate([
            'nama_produk' => 'required', //
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required', //
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // Wajib menyertakan gambar, maksimal 2MB
            'kategori' => 'required',
        ]);

        $pathImage = null;

        // PERUBAHAN: Proses menangkap file gambar dan memindahkannya ke folder storage
        if ($request->hasFile('gambar')) {
            // Gambar disimpan otomatis di: storage/app/public/produk/
            $pathImage = $request->file('gambar')->store('produk', 'public');
        }

        Product::create([
            'nama_produk' => $request->nama_produk, //
            'harga' => $request->harga, //
            'stok' => $request->stok, //
            'deskripsi' => $request->deskripsi, //
            'gambar' => $pathImage, // Menyimpan jalur string (misal: "produk/xyz123.jpg") ke database
            'kategori' => $request->kategori, //
            'status' => true, //
        ]);

        return redirect('/admin/products')->with('success', 'Produk berhasil ditambahkan!'); //
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Produk
    |--------------------------------------------------------------------------
    */
    public function show(Product $product)
    {
        return view(
            'products.show',
            compact('product')
        ); //
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Produk
    |--------------------------------------------------------------------------
    */
    public function edit(Product $product)
    {
        return view(
            'admin.products.edit',
            compact('product')
        ); //
    }

    /*
    |--------------------------------------------------------------------------
    | Update Produk
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Product $product) //
    {
        // PERUBAHAN: Validasi disesuaikan. Gambar bertipe 'nullable' agar produk bisa diedit tanpa harus mengganti gambar.
        $request->validate([
            'nama_produk' => 'required', //
            'harga' => 'required|numeric', //
            'stok' => 'required|numeric', //
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // Opsional, jika diunggah maksimal 2MB
            'kategori' => 'required',
        ]);

        // Ambil data gambar yang saat ini tersimpan di database
        $pathImage = $product->gambar;

        // PERUBAHAN: Jika admin memilih dan mengunggah berkas file gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari server jika filenya memang terdeteksi ada (biar memori penyimpanan tidak penuh)
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }

            // Simpan berkas gambar baru ke folder storage/app/public/produk/
            $pathImage = $request->file('gambar')->store('produk', 'public');
        }

        $product->update([
            'nama_produk' => $request->nama_produk, //
            'harga' => $request->harga, //
            'stok' => $request->stok, //
            'deskripsi' => $request->deskripsi, //
            'gambar' => $pathImage, // Memperbarui dengan data path gambar (baru/tetap yang lama)
            'kategori' => $request->kategori, //
        ]);

        return redirect('/admin/products')->with('success', 'Produk berhasil diperbarui!'); //
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Produk
    |--------------------------------------------------------------------------
    */
    public function destroy(Product $product)
    {
        // TAMBAHAN BAGUS: Hapus file gambar dari disk storage saat data produk dihapus dari database
        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete(); //

        return redirect('/admin/products')->with('success', 'Produk berhasil dihapus!'); //
    }
}