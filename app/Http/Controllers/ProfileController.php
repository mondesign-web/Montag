<?php

namespace App\Http\Controllers;

use App\Models\Profile; // Importation du modèle
use App\Models\ProfileDocument;
use App\Models\ProfileInsight; // Importation du modèle
use App\Models\Contact;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use JeroenDesloovere\VCard\VCard;


class ProfileController extends Controller
{
   /*
    public function create()
    {
        // Récupérez le nom de l'utilisateur connecté
        $user = auth()->user();

        // Vérifiez que l'utilisateur est connecté et récupérez la première lettre de son nom
        $nameUser = $user ? $this->getFirstLetter($user->name) : '';

        // Passez la variable à la vue
        return view('profiles.create', compact('nameUser'));
       
    }
        */
    public function create()
{
    // Vérifiez si l'utilisateur connecté a déjà un profil
    if (Profile::where('user_id', auth()->id())->exists()) {
        return redirect()->route('profiles.index')->with('error', 'Vous avez déjà un profil.');
    }

    // Récupérez le nom de l'utilisateur connecté
    $user = auth()->user();

    // Vérifiez que l'utilisateur est connecté et récupérez la première lettre de son nom
    $nameUser = $user ? $this->getFirstLetter($user->name) : '';

    // Retournez la vue pour créer un profil
    return view('profiles.create', compact('nameUser'));
}


    public function getFirstLetter($name){
        // Récupérer la première lettre
        $firstLetter = strtoupper(substr($name, 0, 1));

        return $firstLetter;
    }

    
    
    public function store(Request $request)
    {
        // Vérifiez si un profil existe déjà pour l'utilisateur
    if (Profile::where('user_id', auth()->id())->exists()) {
        return redirect()->route('profiles.index')->with('error', 'Vous ne pouvez créer qu\'un seul profil.');
    }
            $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_color' => 'nullable|string|max:7',
            'nfc_tag_id' => 'required|string|unique:profiles,nfc_tag_id',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/', // Valide un numéro de téléphone (format international)
            'address' => 'nullable|string|max:255',
            //social links
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'snapchat' => 'nullable|url',
            'telegram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'behance' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'twiter' => 'nullable|url',
            'discord' => 'nullable|url',
            'youtube' => 'nullable|url',
            //document & links
            'links' => 'nullable|array',
            'links.*' => 'nullable|url',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|mimes:pdf|max:20480',
            'links' => 'nullable|array',
     
            //'qr_code' => 'nullable|string',
            //'profile_link' => 'nullable|url',
        ]);

        // Gérer le téléchargement de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        }

        $profile = Profile::create(array_merge($validated, [
            'user_id' => auth()->id(),
            'name' => $request->name,
            'title' => $request->title,
            'bio' => $request->bio,
            'photo_url' => $photoPath,
            'background_color' => $request->background_color,
            'nfc_tag_id' => $request->nfc_tag_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gallery' => 'nullable|array', // Ajouter la galerie
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Fichiers d'images pour la galerie
           // 'qr_code' => $request->qr_code,
           // 'profile_link'=> $request->profile_link,
        ]));

        // Ajouter les liens sociaux
        SocialLink::create([
            'profile_id' => $profile->id,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'snapchat' => $request->snapchat,
            'telegram' => $request->telegram,
            'tiktok' => $request->tiktok,
            'pinterest' => $request->pinterest,
            'behance' => $request->behance,
            'dribbble' => $request->dribbble,
            'youtube' => $request->dribbble,
            'twiter' => $request->dribbble,
            'discord' => $request->dribbble,
        ]);
        /*
        $profile = Profile::create([
            'user_id' => auth()->id(), // Associe l'utilisateur connecté
            'name' => $request->name,
            'title' => $request->title,
            'bio' => $request->bio,
            'photo_url' => $photoPath,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'background_color' => $request->background_color,
            'nfc_tag_id' => $request->nfc_tag_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
           // 'qr_code' => $request->qr_code,
           // 'profile_link'=> $request->profile_link,
        ]);
*/
             // Save links
            /*if ($request->has('links')) {
                foreach ($request->links as $link) {
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id,
                        'type' => 'link',
                        'content' => $link,
                    ]);
                }
            } 

            // Save documents
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $file) {
                    $path = $file->store('documents', 'public');
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id,
                        'type' => 'document',
                        'content' => $path,
                    ]);
                }
            }*/
            if (!empty($validated['links'])) {
                foreach (array_filter($validated['links']) as $link) { // Filter out empty links
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id,
                        'type' => 'link',
                        'content' => $link,
                    ]);
                }
            }
        
            // Process and save documents
            if ($request->has('documents')) {
                foreach ($request->file('documents') as $document) {
                    $path = $document->store('documents', 'public');
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id,
                        'type' => 'document',
                        'content' => $path,
                    ]);
                }
            }

            // Enregistrer les images dans la galerie
            /*if ($request->has('gallery')) {
                foreach ($request->file('gallery') as $galleryItem) {
                    $path = $galleryItem->store('gallery', 'public');
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id,
                        'type' => 'gallery',
                        'content' => $path,
                    ]);
                }
            }*/
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $path = $file->store('gallery', 'public');
                    ProfileDocument::create([
                        'user_id' => auth()->id(),
                        'profile_id' => $profile->id, // ID du profil lié
                        'type' => 'gallery',
                        'content' => $path, // Chemin du fichier
                    ]);
                }
            }
            
            $profileUrl = route('profiles.show', $profile->id);

            // Utiliser SVG au lieu de PNG pour éviter Imagick
            $qrCodeImage = QrCode::format('svg')->size(200)->generate($profileUrl);
            // Enregistrer le fichier QR Code
            $qrCodePath = "qrcodes/profile-{$profile->id}.svg";
            Storage::disk('public')->put($qrCodePath, $qrCodeImage);
            $profile->update([
                'qr_code' => $qrCodePath, // Path to the QR Code image
                'profile_link' => $profileUrl, // URL the QR Code points to
            ]);
            
        return redirect()->route('profiles.show', $profile->id)->with('success', 'Profile created successfully!');
        

    }

    public function show(Profile $profile)
    {
        $isOwner = auth()->check() && auth()->id() === $profile->user_id;

        $nameUser = $this->getFirstLetter($profile->name);

        // Fetch the documents (links and PDFs) associated with this profile
        $documents = $profile->documents;

        $socialLink = $profile->socialLink;

        // Incrémenter les vues
        $insights  = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id]);
        $insights->increment('views');

        return view('profiles.show', compact('profile', 'isOwner', 'nameUser', 'documents', 'socialLink'));
    }

    /*
    public function update(Request $request, Profile $profile)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'nfc_tag_id' => 'required|string|unique:profiles,nfc_tag_id,' . $profile->id,
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/',
            'address' => 'nullable|string|max:255',
            'links' => 'nullable|array',
            'links.*' => 'nullable|url',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|mimes:pdf|max:20480',
            'gallery' => 'nullable|array', // Ajouter la galerie
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Fichiers d'images pour la galerie

        ]);

        // Gérer le téléchargement de la nouvelle photo
        if ($request->hasFile('photo')) {
            if ($profile->photo_url && \Storage::disk('public')->exists($profile->photo_url)) {
                \Storage::disk('public')->delete($profile->photo_url);
            }
            $profile->photo_url = $request->file('photo')->store('profile_photos', 'public');
        }

        // Mettre à jour les données du profil
        $profile->update([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'bio' => $validated['bio'],
            'facebook' => $validated['facebook'],
            'instagram' => $validated['instagram'],
            'whatsapp' => $validated['whatsapp'],
            'linkedin' => $validated['linkedin'],
            'nfc_tag_id' => $validated['nfc_tag_id'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);

        // **Gérer les liens**
        if ($request->has('links')) {
            // Supprimer tous les anciens liens associés au profil
            ProfileDocument::where('profile_id', $profile->id)->where('type', 'link')->delete();

            // Ajouter les nouveaux liens
            foreach (array_filter($validated['links']) as $link) {
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'link',
                    'content' => $link,
                ]);
            }
        }

        // **Gérer les documents**
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $path = $document->store('documents', 'public');
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'document',
                    'content' => $path,
                ]);
            }
        }

        if($request->hasFile('gallery')){
            foreach($request->files('gallery') as $galleryItem){
                $path = $galleryItem->store('gallery', 'public');
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'gallery',
                    'content' => $path,
                ]);
            }
        }

        // Rediriger avec un message de succès
        return redirect()->route('profiles.show', $profile)->with('success', 'Profile updated successfully!');
    }
    */
    public function update(Request $request, Profile $profile)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nfc_tag_id' => 'required|string|unique:profiles,nfc_tag_id,' . $profile->id,
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/',
            'address' => 'nullable|string|max:255',
            'links' => 'nullable|array',
            'links.*' => 'nullable|url',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|mimes:pdf|max:20480',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Validation des liens sociaux
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'snapchat' => 'nullable|url',
            'telegram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'behance' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'twiter' => 'nullable|url',
            'discord' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);
    
        // **Gérer le téléchargement de la nouvelle photo**
        if ($request->hasFile('photo')) {
            if ($profile->photo_url && \Storage::disk('public')->exists($profile->photo_url)) {
                \Storage::disk('public')->delete($profile->photo_url);
            }
            $profile->photo_url = $request->file('photo')->store('profile_photos', 'public');
        }
    
        // **Mettre à jour les données du profil**
        $profile->update([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'bio' => $validated['bio'],
            'nfc_tag_id' => $validated['nfc_tag_id'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);
    
        // **Gérer les liens sociaux**
        $socialLinksData = $request->only([
            'facebook', 'instagram', 'whatsapp', 'linkedin', 'snapchat', 
            'telegram', 'tiktok', 'pinterest', 'behance', 'dribbble', 
            'twiter', 'discord', 'youtube'
        ]);
    
        // Vérifier si le profil a déjà des liens sociaux
        $socialLink = $profile->socialLink;
    
        if ($socialLink) {
            // Mettre à jour les liens sociaux existants
            $socialLink->update($socialLinksData);
        } else {
            // Créer une nouvelle entrée de liens sociaux
            $profile->SocialLink()->create($socialLinksData);
        }
    
        // **Gérer les liens**
        if ($request->has('links')) {
            // Supprimer tous les anciens liens associés au profil
            ProfileDocument::where('profile_id', $profile->id)->where('type', 'link')->delete();
    
            // Ajouter les nouveaux liens
            foreach (array_filter($validated['links']) as $link) {
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'link',
                    'content' => $link,
                ]);
            }
        }
    
        // **Gérer les documents**
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $path = $document->store('documents', 'public');
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'document',
                    'content' => $path,
                ]);
            }
        }
    
        // **Gérer la galerie**
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryItem) {
                $path = $galleryItem->store('gallery', 'public');
                ProfileDocument::create([
                    'user_id' => auth()->id(),
                    'profile_id' => $profile->id,
                    'type' => 'gallery',
                    'content' => $path,
                ]);
            }
        }
    
        // Rediriger avec un message de succès
        return redirect()->route('profiles.show', $profile)->with('success', 'Profile updated successfully!');
    }
    

    public function destroyDocument($id)
    {
        $document = ProfileDocument::findOrFail($id);

        // Supprimer le fichier du stockage
        if (\Storage::disk('public')->exists($document->content)) {
            \Storage::disk('public')->delete($document->content);
        }

        // Supprimer l'entrée de la base de données
        $document->delete();

        return response()->json(['message' => 'Document supprimé avec succès.']);
    }

    public function destroyGellery($id)
    {
        $galleryItem = ProfileDocument::findOrFail($id);
        
        // Supprimer le fichier du stockage
        if (\Storage::disk('public')->exists($galleryItem->content)) {
            \Storage::disk('public')->delete($galleryItem->content);
        }

        // Supprimer l'entrée de la base de données
        $galleryItem->delete();

        return response()->json(['message' => 'gallery supprimé avec succès.']);
    }



    public function edit(Profile $profile)
    {
        $documents = $profile->documents;
        $socialLink = $profile->socialLink;
        $nameUser = $this->getFirstLetter($profile->name);
        return view('profiles.edit', compact('profile', 'documents', 'nameUser', 'socialLink'));
    }

/*
public function generateQrCode($profileId)
    {
        // Générer l'URL du profil
        $profileUrl = route('profiles.show', $profileId);

        // Générer le QR Code
        $qrCode = QrCode::size(200) // Taille en pixels
            ->backgroundColor(255, 255, 255) // Couleur de fond (optionnel)
            ->color(0, 0, 0) // Couleur du QR Code
            ->generate($profileUrl);

        // Retourner une vue avec le QR Code
        return view('profiles.qrcode', compact('qrCode', 'profileUrl'));
    }
*/

/*
    public function index()
    {
        // Récupérer uniquement les profils de l'utilisateur connecté
        $profiles = Profile::where('user_id', auth()->id())->get();

        // Retourner la vue avec les profils
        return view('profiles.index', compact('profiles'));
    }
*/  
    public function index(Request $request)
    {
        $query = Profile::where('user_id', auth()->id());

        // Filtrer par recherche si un paramètre est fourni
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');
                });
        }

        // Récupérer les profils après filtrage
        $profiles = $query->get();
        
        $profiles->each(function ($profile) {
            $profile->nameInitial = strtoupper(substr($profile->name, 0, 1)); // Add the initial as a property
        });

        // Retourner la vue avec les profils
        return view('profiles.index', compact('profiles'));
    }
    
    public function list()
    {
        // Récupérer uniquement les profils de l'utilisateur connecté
        $profiles = Profile::where('user_id', auth()->id())->get();

        $profiles->each(function ($profile) {
            $profile->nameInitial = strtoupper(substr($profile->name, 0, 1)); // Add the initial as a property
        });

        // Retourner la vue avec les profils
        return view('home', compact('profiles'));
    }

   public function ContactList(Profile $profile)
   {
        // Récupérer les contacts liés au profil
        $contacts = Contact::where('profile_id', $profile->id)->get();

        return view('contact', compact('profile', 'contacts'));
   }
    

    public function destroy($id)
    {
        // Trouvez le profil de l'utilisateur authentifié
        $profile = Profile::where('user_id', auth()->id())->findOrFail($id);

        // Supprimez l'image associée si nécessaire
        if ($profile->photo_url && \Storage::disk('public')->exists($profile->photo_url)) {
            \Storage::disk('public')->delete($profile->photo_url);
        }
         // Delete the QR code file if it exists
        if ($profile->qr_code && \Storage::disk('public')->exists($profile->qr_code)) {
          \Storage::disk('public')->delete($profile->qr_code);
        } else {
        // Log an error if the QR code file was not found or couldn't be deleted
        Log::error('Le QR Code n\'a pas été trouvé ou supprimé', [
            'qr_code_path' => $profile->qr_code,
        ]);
        }

        // Supprimer les relations associées
        $profile->socialLink()->delete();
        $profile->documents()->delete();
        $profile->insights()->delete();
        
        // Supprimez le profil
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profil supprimé avec succès.');
    }

   
    public function ShowLink()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        // Vérifier si le profil existe
        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Profil introuvable.');
        }
        
        return view('profiles.link', compact('profile'));
    }


    

    public function downloadVCard(Profile $profile)
    {
        /* $insights = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id']);
        $insights->increment('contact_downloads');
        */ 
        $insights = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id]);
        $insights->increment('contact_downloads');
        // Initialize vCard
        $vcard = new VCard();

        // Add basic details to the vCard
        $vcard->addName($profile->name); // Name of the person
        $vcard->addJobtitle($profile->title ?? ''); // Job title
        $vcard->addEmail($profile->email ?? ''); // Email address
        $vcard->addPhoneNumber($profile->phone ?? ''); // Phone number
        $vcard->addAddress(null, null, $profile->address ?? '', null, null, null, null); // Address
        $vcard->addURL($profile->profile_link ?? route('profiles.show', $profile->id)); // Profile URL
        $vcard->addURL($profile->facebook ?? 'https://www.facebook.com/');
        $vcard->addURL($profile->whatsapp ?? 'https://web.whatsapp.com/');
        $vcard->addURL($profile->instagram ?? 'https://www.instagram.com/');
        $vcard->addURL($profile->linkedin ?? 'https://www.linkedin.com/');
      
        // Generate dynamic filename based on the user's name
        $filename = 'contact_' . strtolower(str_replace(' ', '_', $profile->name)) . '.vcf';

         // Generate and return the vCard as a response 
         return response($vcard->getOutput(), 200, [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    public function contactExchanged(Request $request, Profile $profile)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $insights = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id]);
        $insights->increment('contact_exchanged');

         // Sauvegarder les informations du contact dans une table "contacts" (optionnel)
        Contact::create([
            'profile_id' => $profile->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ]);


        return back()->with('success', 'Contact exchanged recorded!');
    }

    public function linkTapped(Profile $profile)
    {
        $insights = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id]);
        $insights->increment('link_taps');

        return response()->json(['success' => true]);
    }


    /*public function getInsights()
    {
        $user = auth()->user();

        // Charger le profil de l'utilisateur connecté
        $profile = $user->profile;

        // Vérifier si le profil existe
        if (!$profile) {
            return redirect()->route('home')->with('error', 'No profile found for the user.');
        }

        // Charger les insights associés au profil
        $insights = $profile->insights;

        // Retourner les données à la vue 'home'
        return view('home', compact('profile', 'insights'));
       
         // Récupérer les profils avec leurs insights
        $profiles = Profile::with('insights')->get();

        return view('home', compact('profiles'));
    } */


    /*public function shareLinks(Profile $profile)
    {
        // Vérifier si un enregistrement d'insights existe, sinon en créer un
        //$insights = $profile->insights ?? ProfileInsight::create(['profile_id' => $profile->id]);
    
        // Incrémenter le nombre de partages
        //$insights->increment('share_links');

        // Vérifier si un enregistrement d'insights existe, sinon en créer un
        $insights = $profile->insights;

        if (!$insights) {
            $insights = ProfileInsight::create(['profile_id' => $profile->id, 'share_links' => 1]); // Initialiser avec 1 partage
        } else {
            $insights->increment('share_links'); // Incrémenter
        }
    
        //dd($insights);
        return response()->json(['success' => true, 'share_links' => $insights->share_links]);
        //return redirect()->route('profiles.show', $profile);
    }
    */

    public function shareLinks(Profile $profile)
    {
        \Log::info("Requête AJAX reçue pour le profil ID: " . $profile->id);

        // Vérifier si un enregistrement d'insights existe, sinon en créer un
        $insights = $profile->insights;

        if (!$insights) {
            \Log::info("Aucun insight trouvé, création d'un nouvel enregistrement...");
            $insights = ProfileInsight::create(['profile_id' => $profile->id, 'share_links' => 1]); // Initialiser avec 1 partage
        } else {
            \Log::info("Insight trouvé, incrémentation de share_links...");
            $insights->increment('share_links'); // Incrémenter
        }

        \Log::info("Nouvelle valeur de share_links: " . $insights->share_links);

        return response()->json(['success' => true, 'share_links' => $insights->share_links]);
    }

}
    
