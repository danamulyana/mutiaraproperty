<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';

    protected $fillable = [
        'encrypt',
        'ip',
        'iso',
        'country',
        'city',
        'state',
        'state_name',
        'postal_code',
        'lat',
        'lon',
        'date',
    ];
}
