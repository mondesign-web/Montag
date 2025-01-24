<?php

namespace App\Http\Controllers;

use App\Models\Profile; // Importation du modèle
use App\Models\ProfileDocument;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use JeroenDesloovere\VCard\VCard;


class ProfileController extends Controller
{
   
    public function create()
    {
        // Récupérez le nom de l'utilisateur connecté
        $user = auth()->user();

        // Vérifiez que l'utilisateur est connecté et récupérez la première lettre de son nom
        $nameUser = $user ? $this->getFirstLetter($user->name) : '';

        // Passez la variable à la vue
        return view('profiles.create', compact('nameUser'));
       
    }

    public function getFirstLetter($name){
        // Récupérer la première lettre
        $firstLetter = strtoupper(substr($name, 0, 1));

        return $firstLetter;
    }

    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'background_color' => 'nullable|string|max:7',
            'nfc_tag_id' => 'required|string|unique:profiles,nfc_tag_id',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/', // Valide un numéro de téléphone (format international)
            'address' => 'nullable|string|max:255',
            'links' => 'nullable|array',
            'links.*' => 'nullable|url',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|mimes:pdf|max:2048',
            'links' => 'nullable|array',


            //'qr_code' => 'nullable|string',
            //'profile_link' => 'nullable|url',
        ]);

        // Gérer le téléchargement de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        }

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
        $nameUser = $this->getFirstLetter($profile->name);

        // Fetch the documents (links and PDFs) associated with this profile
        $documents = $profile->documents;
        
        return view('profiles.show', compact('profile', 'nameUser', 'documents'));
    }


    public function update(Request $request, Profile $profile)
    {
    // Validation des données entrantes
    $request->validate([
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
        'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/', // Valide un numéro de téléphone (format international)
        'address' => 'nullable|string|max:255',
        'links' => 'nullable|array',
        'links.*' => 'nullable|url',
        'documents' => 'nullable|array',
        'documents.*' => 'nullable|mimes:pdf|max:2048',
    ]);

    // Gérer le téléchargement de la nouvelle photo, si nécessaire
    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne photo si elle existe
        if ($profile->photo_url && \Storage::disk('public')->exists($profile->photo_url)) {
            \Storage::disk('public')->delete($profile->photo_url);
        }

        // Sauvegarder la nouvelle photo
        $profile->photo_url = $request->file('photo')->store('profile_photos', 'public');
    }

    // Mettre à jour les données du profil
    $profile->update([
        'name' => $request->name,
        'title' => $request->title,
        'bio' => $request->bio,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'whatsapp' => $request->whatsapp,
        'linkedin' => $request->linkedin,
        'nfc_tag_id' => $request->nfc_tag_id,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        // 'qr_code' => $request->qr_code, // Ne pas modifier le QR Code
    ]);

     // Gérer les liens
     if ($request->has('links')) {
        // Supprimer les anciens liens associés au profil
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

    // Gérer les documents
    if ($request->has('documents')) {
        // Supprimer les anciens documents associés au profil
        $existingDocuments = ProfileDocument::where('profile_id', $profile->id)->where('type', 'document')->get();

        foreach ($existingDocuments as $document) {
            if (\Storage::disk('public')->exists($document->content)) {
                \Storage::disk('public')->delete($document->content);
            }
            $document->delete();
        }

        // Ajouter les nouveaux documents
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

    // Rediriger avec un message de succès
    return redirect()->route('profiles.show', $profile)->with('success', 'Profile updated successfully!');
}

    public function edit(Profile $profile)
    {
        $documents = $profile->documents;
        $nameUser = $this->getFirstLetter($profile->name);
        return view('profiles.edit', compact('profile', 'documents', 'nameUser'));
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

        
        // Supprimez le profil
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profil supprimé avec succès.');
    }

    public function ShowLink(Profile $profile)
    {
        return view('profiles.link', compact('profile'));
    }

    public function downloadVCard(Profile $profile)
    {
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

}
    
