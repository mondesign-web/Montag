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

    
    public function analytics()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer les insights du profil
        $insights = ProfileInsight::where('profile_id', $profile->id)
            ->selectRaw("DATE(created_at) as date, SUM(views) as views, SUM(contact_exchanged) as contact_exchanged, SUM(contact_downloads) as contact_downloads, SUM(link_taps) as link_taps")
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Récupérer toutes les dates manquantes
        $startDate = $insights->first() ? Carbon::parse($insights->first()->date) : now();
        $endDate = $insights->last() ? Carbon::parse($insights->last()->date) : now();

        $allDates = collect();
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $allDates->push($date->format('d/m/Y'));
        }

        // Fusionner les données existantes avec les dates manquantes
        $insights = $allDates->map(function ($date) use ($insights) {
            $insight = $insights->firstWhere('date', $date);
            return [
                'date' => $date,
                'views' => $insight->views,
                'contact_exchanged' => $insight->contact_exchanged,
                'contact_downloads' => $insight->contact_downloads,
                'link_taps' => $insight->link_taps
            ];
        });

        //dd($insights->pluck('date'));
        dd($insights);

        return view('profiles.analytics', compact('profile', 'insights'));
    }

        
}




