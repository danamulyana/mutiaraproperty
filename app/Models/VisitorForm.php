<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorForm extends Model
{
    use HasFactory;

    protected $table = 'visitor_forms';

    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
        'tujuan'
    ];
}
