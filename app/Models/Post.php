<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'cover_image',
        'meta_description',
        'published_at',
        'featured',
        'author_id',
        'category_id',
    ];

    public function User() : BelongsTo
    {
        return $this->belongsTo(User::class , 'author_id')->withDefault('Admin User');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function searchPost($search)
    {
        return empty($search) ? static::query()
        : static::query()->where('id', 'like', '%' . $search . '%')
        ->orWhere('title','like', '%' . $search . '%')
        ->orWhere('body','like', '%' . $search . '%');
    }
}
