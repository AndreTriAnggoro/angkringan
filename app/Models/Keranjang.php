<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga', 'jumlah', 'total', 'no_meja', 'total_keseluruhan'];
    protected $dateFormat = 'Y-m-d H:i';
}

