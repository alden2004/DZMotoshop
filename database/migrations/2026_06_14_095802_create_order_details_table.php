<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {

            $table->id();


            // pesanan
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();


            // produk yang dibeli
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();


            // jumlah barang
            $table->integer('qty');


            // harga saat transaksi
            $table->integer('harga');


            $table->timestamps();

        });
    }



    public function down()
    {
        Schema::dropIfExists('order_details');
    }

};