<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    // Menampilkan Halaman Form Checkout
    public function index()
    {
        // Cek apakah ada data pembelian langsung (buy_now), jika tidak ada ambil dari keranjang (cart)
        if (session()->has('buy_now')) {
            $cart = [session()->get('buy_now')];
        } else {
            $cart = session()->get('cart', []);
        }
        
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang kamu masih kosong!');
        }

        return view('checkout', compact('cart'));
    }

    // Memproses Pemesanan dan Menyimpan ke Database
    public function process(Request $request)
    {
        // Ambil data dari sumber yang aktif (buy_now atau cart)
        if (session()->has('buy_now')) {
            $cart = [session()->get('buy_now')];
            $isBuyNow = true;
        } else {
            $cart = session()->get('cart', []);
            $isBuyNow = false;
        }
        
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Tidak ada produk untuk diproses.');
        }

        // Validasi Form
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'alamat'        => 'required|string',
            'metode_bayar'  => 'required|string',
        ]);

        // Hitung Total
        $totalBayar = 0;
        foreach ($cart as $item) {
            $totalBayar += ($item['harga'] ?? 0) * ($item['quantity'] ?? 1);
        }

        $invoiceNo = 'INV/' . date('Ymd') . '/DZ/' . rand(1000, 9999);

        // Simpan langsung ke Database
        Order::create([
            'user_id'       => auth()->id(),
            'invoice_no'    => $invoiceNo,
            'nama_penerima' => $validated['nama_penerima'],
            'no_hp'         => $validated['no_hp'],
            'alamat'        => $validated['alamat'],
            'metode_bayar'  => $validated['metode_bayar'],
            'status'        => 'dikemas',
            'total_bayar'   => $totalBayar,
            'items'         => json_encode($cart),
        ]);
        
        // Hapus session sesuai jalur pembelian yang digunakan
        if ($isBuyNow) {
            session()->forget('buy_now');
        } else {
            session()->forget('cart');
        }

        return redirect()->route('order.packed')->with('success', 'Pesanan berhasil dibuat!');
    }

    // Menampilkan Halaman Status Pesanan User Langsung dari Database
    public function packed()
    {
        // Ambil data pesanan milik user yang sedang login dari Database secara real-time
        $ordersFromDb = Order::where('user_id', auth()->id())
                            ->latest()
                            ->get();

        // Mapping data agar kompatibel dengan struktur tampilan view 'packed' kamu
        $orders = [];
        foreach ($ordersFromDb as $order) {
            $orders[] = [
                'id'            => $order->id,
                'invoice_no'    => $order->invoice_no,
                'nama_penerima' => $order->nama_penerima,
                'no_hp'         => $order->no_hp,
                'alamat'        => $order->alamat,
                'metode_bayar'  => $order->metode_bayar,
                'status'        => strtolower($order->status),
                'total_bayar'   => $order->total_bayar,
                'items'         => json_decode($order->items, true),
                'created_at'    => $order->created_at->format('d M Y, H:i')
            ];
        }

        return view('packed', compact('orders'));
    }
}