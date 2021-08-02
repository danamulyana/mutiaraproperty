<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discover extends Model
{
    use HasFactory;

    protected $table = 'discovers';

    protected $fillable = [
        'discover_title',
        'slug',
        'title',
        'subtitle',
        'video',
        'video_link',
    ];

    public function discoverList(): HasMany
    {
        return $this->hasMany(DiscoverList::class);
    }
}
