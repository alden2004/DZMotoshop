<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();


            // pesanan yang dibayar
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();


            // metode pembayaran
            $table->enum('metode', [

                'transfer_bank',
                'e_wallet',
                'retail',
                'qris'

            ]);


            // bukti pembayaran
            $table->string('bukti_pembayaran')
                ->nullable();


            // status pembayaran
            $table->enum('status', [

                'belum_bayar',
                'menunggu_verifikasi',
                'diterima',
                'ditolak'

            ])->default('belum_bayar');


            $table->timestamps();

        });
    }



    public function down()
    {
        Schema::dropIfExists('payments');
    }

};