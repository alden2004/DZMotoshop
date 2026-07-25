<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view(
            'admin.orders.index',
            compact('orders')
        );
    }

    /**
     * Menghapus pesanan secara permanen dari database berdasarkan ID.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus secara permanen dari database.');
    }
}