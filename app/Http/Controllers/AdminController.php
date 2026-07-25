<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Halaman Utama Dashboard Admin
     */
    public function index()
    {
        $totalProduk = Product::count();
        $totalPesanan = Order::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalPesanan',
            'totalUser'
        ));
    }

    /**
     * Halaman Daftar Pesanan Admin (Semua Pesanan)
     */
    public function orders()
    {
        // Mengambil pesanan dari database beserta data user-nya saja agar aman
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Halaman Pesanan Dikemas (Packed Orders)
     */
    public function packedOrders()
    {
        $packedOrders = Order::with('user')
            ->whereIn('status', ['packed', 'dikemas'])
            ->latest()
            ->get();

        return view('admin.orders.packed', compact('packedOrders'));
    }

    /**
     * Update Status Pesanan oleh Admin (dibuat, dikemas, dikirim, selesai)
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:dibuat,dikemas,dikirim,selesai,packed,shipped,completed',
        ]);

        $status = strtolower($request->status);

        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan di database.');
        }

        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}