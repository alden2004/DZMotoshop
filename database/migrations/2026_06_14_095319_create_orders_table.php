<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // User yang membeli
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Kolom pelengkap data pesanan (Sesuai dengan CheckoutController)
            $table->string('invoice_no');
            $table->string('nama_penerima');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('metode_bayar');
            $table->decimal('total_bayar', 12, 2); // Menggunakan decimal agar aman untuk harga rupiah
            $table->text('items'); // Untuk menyimpan data keranjang dalam bentuk JSON

            // Status pesanan disesuaikan dengan alur admin (dikemas, dikirim, selesai, dll)
            $table->string('status')->default('dikemas');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};