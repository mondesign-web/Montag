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
        /*'facebook',
        'instagram',
        'whatsapp',
        'linkedin',*/
        'nfc_tag_id',
        'background_color',
        'qr_code',
        'profile_link',
        'email',
        'phone',
        'address',
    ];

    protected static function booted()
    {
        static::deleting(function ($profile) {
            // Supprimer les social links
            $profile->socialLink()->delete();

            // Supprimer les documents
            $profile->documents()->delete();

            // Supprimer les insights
            $profile->insights()->delete();

            // Supprimer les contacts
            $profile->contact()->delete();
        });
    }

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
   
    public function socialLink()
    {
        return $this->hasOne(SocialLink::class, 'profile_id');
    }
    


    
}
