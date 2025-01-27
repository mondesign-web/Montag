<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileInsight extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'views',
        'contact_exchanged',
        'contact_downloads',
        'link_taps',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
