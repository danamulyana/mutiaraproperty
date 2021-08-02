<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utils extends Model
{
    use HasFactory;

    protected $table = 'utils';

    protected $fillable = [
        'logo',
        'address',
        'name_site',
        'telp_site',
        'email_site',
        'facebook_site',
        'twitter_site',
        'instagram_site',
        'youtube_site',
        'linked_site',
        'whatsapp_no',
        'whatsapp_message',
    ];
}
