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

    public function analytic()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer les 14 derniers jours sous format YYYY-MM-DD
        $days = collect(range(0, 13))->map(function ($day) {
            return Carbon::today()->subDays($day)->format('Y-m-d');
        })->reverse()->values();

        // Récupérer les insights groupés par date
        $insights = ProfileInsight::where('profile_id', $profile->id)
            ->whereBetween('created_at', [Carbon::today()->subDays(13), Carbon::today()])
            ->selectRaw('DATE(created_at) as date, SUM(views) as views, SUM(contact_exchanged) as contact_exchanged, SUM(contact_downloads) as contact_downloads, SUM(link_taps) as link_taps')
            ->groupByRaw('DATE(created_at)')
            ->orderBy('date', 'ASC')
            ->get()
            ->keyBy('date');

        // Formatter les données pour la vue
        $formattedInsights = [];
        $viewsData = [];
        $contactsData = [];

        foreach ($days as $day) {
            $formattedInsights[] = [
                'date' => Carbon::parse($day)->format('d/m/Y'),
                'views' => $insights[$day]->views ?? 0,
                'contact_exchanged' => $insights[$day]->contact_exchanged ?? 0,
                'contact_downloads' => $insights[$day]->contact_downloads ?? 0,
                'link_taps' => $insights[$day]->link_taps ?? 0,
            ];

            $viewsData[] = $insights[$day]->views ?? 0;
            $contactsData[] = $insights[$day]->contact_exchanged ?? 0;
        }

        dd($formattedInsights);
        return view('analytic', compact('profile', 'days', 'viewsData', 'contactsData'));
    }
    
    /*
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
    */   

/*
    public function analytics()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer les insights du profil
        $insightsRaw = ProfileInsight::where('profile_id', $profile->id)
            ->selectRaw("DATE(created_at) as date, SUM(views) as views, SUM(contact_exchanged) as contact_exchanged, SUM(contact_downloads) as contact_downloads, SUM(link_taps) as link_taps")
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Transformer les données en une collection clé-valeur par date
        $insights = $insightsRaw->keyBy('date');

        // Déterminer la plage de dates
        $startDate = Carbon::parse($insightsRaw->first()->date ?? now());
        $endDate = Carbon::now(); // Vous pouvez remplacer par une autre date si besoin

        // Générer toutes les dates dans la plage
        $allDates = collect();
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $allDates->push($date->format('Y-m-d'));
        }

        // Remplir les dates manquantes avec des valeurs par défaut
        $insights = $allDates->map(function ($date) use ($insights) {
            $insight = $insights->get($date);

            return [
                'date' => Carbon::parse($date)->format('d/m/Y'), // Format européen
                'views' => $insight->views ?? 0,
                'contact_exchanged' => $insight->contact_exchanged ?? 0,
                'contact_downloads' => $insight->contact_downloads ?? 0,
                'link_taps' => $insight->link_taps ?? 0,
            ];
        });

        return view('profiles.analytics', compact('profile', 'insights'));
    }
*/  

/*
    public function analytics()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer les statistiques du profil
        $insightsRaw = ProfileInsight::where('profile_id', $profile->id)
            ->selectRaw("DATE(created_at) as date, SUM(views) as views, SUM(contact_exchanged) as contact_exchanged, SUM(contact_downloads) as contact_downloads, SUM(link_taps) as link_taps")
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Transformer les données en une collection clé-valeur par date
        $insightsByDate = $insightsRaw->keyBy('date');

        // Définir les dates de début et de fin
        $startDate = Carbon::parse($insightsRaw->first()->date ?? now());
        $endDate = Carbon::now();

        // Générer toutes les dates entre le début et la fin
        $allDates = collect();
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $allDates->push($date->format('Y-m-d'));
        }

        // Remplir les dates manquantes avec des valeurs par défaut ou des données existantes
        $insights = $allDates->map(function ($date) use ($insightsByDate) {
            $insight = $insightsByDate->get($date); // Récupérer les données pour la date

            return [
                'date' => Carbon::parse($date)->format('d/m/Y'), // Formater la date au format européen
                'views' => $insight->views ?? 0,
                'contact_exchanged' => $insight->contact_exchanged ?? 0,
                'contact_downloads' => $insight->contact_downloads ?? 0,
                'link_taps' => $insight->link_taps ?? 0,
            ];
        });

        dd($insights);
        return view('profiles.analytics', compact('profile', 'insights'));
    }  
 */


    public function analytics()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();
    
        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }
    
        // Récupérer les données brutes depuis la base
        $rawData = ProfileInsight::where('profile_id', $profile->id)
            ->orderBy('created_at', 'ASC')
            ->get();
    
        // Déterminer la première et la dernière date
        $startDate = Carbon::parse($rawData->first()->created_at ?? now());
        $endDate = Carbon::now();
    
        // Préparer un tableau de résultats avec des valeurs par défaut
        $results = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $results[$date->format('Y-m-d')] = [
                'date' => $date->format('d/m/Y'),
                'views' => 0,
                'contact_exchanged' => 0,
                'contact_downloads' => 0,
                'link_taps' => 0,
            ];
        }
    
        // Répartir les données brutes sur les bons jours
        foreach ($rawData as $data) {
            $dateKey = Carbon::parse($data->created_at)->format('Y-m-d');
            if (isset($results[$dateKey])) {
                $results[$dateKey]['views'] += $data->views;
                $results[$dateKey]['contact_exchanged'] += $data->contact_exchanged;
                $results[$dateKey]['contact_downloads'] += $data->contact_downloads;
                $results[$dateKey]['link_taps'] += $data->link_taps;
            }
        }
    
        // Convertir en collection pour passer à la vue
        $insights = collect(array_values($results));
    
        dd($insights);
        return view('profiles.analytics', compact('profile', 'insights'));
    }


    /*public function analytics()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer et grouper les insights par date
        $insights = ProfileInsight::where('profile_id', $profile->id)
            ->selectRaw("DATE(created_at) as date, SUM(views) as views, SUM(contact_exchanged) as contact_exchanged, SUM(contact_downloads) as contact_downloads, SUM(link_taps) as link_taps")
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => \Carbon\Carbon::parse($item->date)->format('d/m/Y'),
                    'views' => (int) $item->views,
                    'contact_exchanged' => (int) $item->contact_exchanged,
                    'contact_downloads' => (int) $item->contact_downloads,
                    'link_taps' => (int) $item->link_taps,
                ];
            });

        return view('profiles.analytics', compact('profile', 'insights'));
    }
*/

    public function insightsChart()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }

        // Récupérer les insights du profil
        $insights = ProfileInsight::where('profile_id', $profile->id)->first();

        if (!$insights) {
            return redirect()->route('profiles.index')->with('error', 'Aucune donnée trouvée.');
        }

        // Préparer les données pour Chart.js
        $data = [
            'views' => $insights->views,
            'contact_downloads' => $insights->contact_downloads,
            'contact_exchanged' => $insights->contact_exchanged,
            'link_taps' => $insights->link_taps,
            'share_links' => $insights->share_links,
        ];

        //dd($data);
        return view('profiles.insights_chart', compact('profile', 'data'));
    }

    public function chartHome(){

        die('Fonction exécutée');

        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();
    
        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
        }
    
        // Récupérer les insights du profil
        $insights = ProfileInsight::where('profile_id', $profile->id)->first();
    
        // Vérifier si les insights existent
        if (!$insights) {
            // Initialiser les valeurs à zéro pour éviter l'erreur
            $data = [
                'views' => 0,
                'contact_downloads' => 0,
                'contact_exchanged' => 0,
                'link_taps' => 0,
                'share_links' => 0,
            ];
        } else {
            // Si les insights existent, récupérer les valeurs
            $data = [
                'views' => $insights->views,
                'contact_downloads' => $insights->contact_downloads,
                'contact_exchanged' => $insights->contact_exchanged,
                'link_taps' => $insights->link_taps,
                'share_links' => $insights->share_links,
            ];
        }
    
        dd($data);
        return view('home', compact('profile', 'data'));
    }
        

        /*
        public function home()
        {
            die('Fonction exécutée');
            $user = auth()->user();
            $profile = Profile::where('user_id', $user->id)->first();
        
            if (!$profile) {
                return redirect()->route('profiles.index')->with('error', 'Aucun profil trouvé.');
            }
        
            // Récupérer les insights du profil
            $insights = ProfileInsight::where('profile_id', $profile->id)->first();
        
            $data = $insights ? [
                'views' => $insights->views,
                'contact_downloads' => $insights->contact_downloads,
                'contact_exchanged' => $insights->contact_exchanged,
                'link_taps' => $insights->link_taps,
                'share_links' => $insights->share_links,
            ] : [
                'views' => 0,
                'contact_downloads' => 0,
                'contact_exchanged' => 0,
                'link_taps' => 0,
                'share_links' => 0,
            ];
        
            // Récupérer d'autres insights pour les graphiques si nécessaire
            $insightsData = ProfileInsight::where('profile_id', $profile->id)->get();
        
            return view('home', compact('profile', 'data', 'insightsData'));
        }
        */
    
}




