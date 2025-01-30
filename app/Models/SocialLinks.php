<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id', 'facebook', 'instagram', 'whatsapp', 'linkedin', 'snapchat', 'telegram', 'tiktok', 'pinterest', 'behance', 'dribbble', 'twiter', 'discord', 'youtube'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
