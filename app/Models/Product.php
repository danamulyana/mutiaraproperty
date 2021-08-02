<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'cover_image',
        'name',
        'type',
        'ukuran',
        'denah',
        'denah2',
        'harga',
        'no_wa',
        'pesan_wa',
    ];
}
