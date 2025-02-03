<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ProfileInsight;
use App\Models\User;
use Carbon\Carbon;


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

    public function index()
    {
        // Récupérer les 14 derniers jours
        $days = collect(range(0, 13))->map(function ($day) {
            return Carbon::today()->subDays($day)->format('Y-m-d');
        })->reverse();

        // Récupérer les données des insights
        $viewsData = ProfileInsight::whereIn('created_at', $days)
            ->selectRaw('DATE(created_at) as date, SUM(views) as total_views')
            ->groupBy('date')
            ->pluck('total_views', 'date')
            ->toArray();

        $contactsData = ProfileInsight::whereIn('created_at', $days)
            ->selectRaw('DATE(created_at) as date, SUM(contact_exchanged) as total_contacts')
            ->groupBy('date')
            ->pluck('total_contacts', 'date')
            ->toArray();

        return view('analytic', compact('days', 'viewsData', 'contactsData'));
    }
        
}




