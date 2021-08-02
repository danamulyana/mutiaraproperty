<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;

    protected $table = "homes";

    protected $fillable = [
        'main_title',
        'main_subtitle',
        'main_video_link',
        'main_video',
        'section1_title',
        'section1_subtitle',
        'section1_video_link',
        'section1_video',
        'section2_title',
        'section2_subtitle',
        'section2_video_link',
        'section2_video',
        'newslater_title',
        'newslater_subtitle',
        'update_name',
        'title_carausel1',
        'subtitle_carausel1',
        'title_carausel2',
        'subtitle_carausel2'
    ];
}
