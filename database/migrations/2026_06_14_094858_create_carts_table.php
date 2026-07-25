<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {

            $table->id();

            // pemilik keranjang
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // produk yang dibeli
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // jumlah barang
            $table->integer('qty')->default(1);

            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('carts');
    }

};