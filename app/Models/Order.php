<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Tambahkan fungsi relasi ini agar error hilang
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}