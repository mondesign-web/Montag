<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileInsight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_id',
        'date',
        'views',
        'contact_exchanged',
        'contact_downloads',
        'link_taps',
        'share_links',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
