<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscoverList extends Model
{
    use HasFactory;

    protected $table = 'discover_lists';

    protected $fillable = [
        'name',
        'image',
    ];

    public function discover() : BelongsTo
    {
        return $this->belongsTo(Discover::class , 'discover_id')->withDefault('1');
    }
}
