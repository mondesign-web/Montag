@extends('/layout')

@section('title', 'Edit Profile')

@section('content')

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Champ pour le nom -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input name="name" id="name" type="text" value="{{ $profile->name }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" required>
            </div>

            <!-- Champ pour le titre -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" id="title" type="text" value="{{ $profile->title }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <!-- Champ pour la bio -->
            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">{{ $profile->bio }}</textarea>
            </div>

            <!-- Champ pour la photo -->
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                <input name="photo" id="photo" type="file"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                @if($profile->photo_url)
                    <img src="{{ asset('storage/' . $profile->photo_url) }}" alt="Profile Photo" class="mt-4 w-32 h-32 rounded-full">
                @endif
            </div>

            <div class="mb-4">
            <input name="email" type="email" value="{{ $profile->email }}" placeholder="Email Address"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                <input name="address" type="text" value="{{ $profile->address }}" placeholder="Adresse "
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                <input name="phone" type="tel" value="{{ $profile->phone }}" placeholder="Phone"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                
            </div>
             
            <!-- Champs pour les réseaux sociaux -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Social Media Links</label>
                <input name="facebook" type="url" value="{{ $profile->facebook }}" placeholder="Facebook URL"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                <input name="instagram" type="url" value="{{ $profile->instagram }}" placeholder="Instagram URL"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                <input name="whatsapp" type="url" value="{{ $profile->whatsapp }}" placeholder="WhatsApp URL"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                <input name="linkedin" type="url" value="{{ $profile->linkedin }}" placeholder="LinkedIn URL"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <!-- Champ pour l'ID NFC -->
            <div class="mb-4">
                <label for="nfc_tag_id" class="block text-sm font-medium text-gray-700">NFC Tag ID</label>
                <input name="nfc_tag_id" id="nfc_tag_id" type="text" value="{{ $profile->nfc_tag_id }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update Profile</button>
        </form>
    </div>

@endsection
