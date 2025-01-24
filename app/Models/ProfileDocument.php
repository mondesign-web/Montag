<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDocument extends Model
{
    protected $fillable = ['user_id', 'profile_id', 'type', 'content'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
}
