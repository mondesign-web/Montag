<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ProfileInsight;
use App\Models\User;


class HomeController extends Controller
{
    /*
    public function index()
    {
        $user = auth()->user();
    
        // Vérifier si l'utilisateur a un profil
        $profile = Profile::where('user_id', $user->id);
    
        // Récupérer les insights du profil s'ils existent
        $insights = ProfileInsight::where('profile_id', $profile->id);
    
        return view('home', compact('profile', 'insights'));
    }
        */


    /*
    public function index()
    {
        $user = auth()->user();

        // Vérifier si le profil existe
        $profile = Profile::where('user_id', $user->id)->with('insights')->first();

        return view('home', compact('profile'));
    }
    */

    /*
    public function index()
    {
        $user = auth()->user();
    
        // Vérifier si le profil existe
        $profile = Profile::where('user_id', $user->id)->with('insights')->first();
    
        // Vérifier si des insights existent
        $insights = $profile ? $profile->insights : null;
    
        return view('home', compact('profile', 'insights'));
    }
        
*/
        
}




