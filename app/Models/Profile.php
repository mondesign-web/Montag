<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'title',
        'bio',
        'photo_url',
        'social_links',
        'facebook',
        'instagram',
        'whatsapp',
        'linkedin',
        'nfc_tag_id',
        'background_color',
        'qr_code',
        'profile_link',
        'email',
        'phone',
        'address',
    ];

    /*
    protected $casts = [
        'social_links' => 'array',
    ];
*/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(ProfileDocument::class);
    }

    public function insights() 
    {
        return $this->hasOne(ProfileInsight::class, 'profile_id');
    }
    
    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
   
    


    
}
