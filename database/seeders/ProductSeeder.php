<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'nama_produk' => 'Knalpot Racing WRX',
            'harga' => 1500000,
            'stok' => 10,
            'deskripsi' => 'Knalpot racing motor dengan suara mantap dan kualitas terbaik',
            'gambar' => null,
            'kategori' => 'Knalpot',
            'status' => true
        ]);


        Product::create([
            'nama_produk' => 'Oli Motul 5100',
            'harga' => 250000,
            'stok' => 20,
            'deskripsi' => 'Oli mesin motor berkualitas untuk performa maksimal',
            'gambar' => null,
            'kategori' => 'Oli',
            'status' => true
        ]);


        Product::create([
            'nama_produk' => 'Kaliper Brembo',
            'harga' => 3800000,
            'stok' => 5,
            'deskripsi' => 'Kaliper rem premium untuk meningkatkan keamanan motor',
            'gambar' => null,
            'kategori' => 'Rem',
            'status' => true
        ]);


        Product::create([
            'nama_produk' => 'Velg Racing RCB',
            'harga' => 2200000,
            'stok' => 8,
            'deskripsi' => 'Velg racing ringan dengan desain sporty',
            'gambar' => null,
            'kategori' => 'Velg',
            'status' => true
        ]);


        Product::create([
            'nama_produk' => 'Shockbreaker YSS',
            'harga' => 1800000,
            'stok' => 7,
            'deskripsi' => 'Shockbreaker nyaman untuk penggunaan harian',
            'gambar' => null,
            'kategori' => 'Suspensi',
            'status' => true
        ]);


        Product::create([
            'nama_produk' => 'Lampu LED Motor',
            'harga' => 350000,
            'stok' => 15,
            'deskripsi' => 'Lampu LED terang dan hemat daya',
            'gambar' => null,
            'kategori' => 'Aksesoris',
            'status' => true
        ]);

    }
}