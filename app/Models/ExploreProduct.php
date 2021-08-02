<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExploreProduct extends Model
{
    use HasFactory;

    protected $table = 'explore_products';

    protected $fillable = [
        'explore_title',
        'slug',
        'title',
        'subtitle',
        'video',
        'baner_1',
        'baner_2',
        'baner_1_link',
        'baner_2_link',
        'title_accord',
        'subtitle_accord',
        'denah_title',
        'denah_subtitle',
        'lat',
        'long',
    ];

    public function product() : HasMany
    {
        return $this->HasMany(Product::class,'explore_id');
    } 
}
