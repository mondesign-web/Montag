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

    <div class="bg-white shadow-xl rounded-lg text-gray-900">
        <div class="w-full h-40 rounded-lg text-center text-white flex items-center justify-center shadow-lg"
            style="background-color: {{ $profile->background_color }};">
            <a href="{{ route('profiles.edit', $profile->id) }}">
                <button
                    class="p-2 rounded-full bg-white group transition-all duration-500 hover:bg-blue-600 flex item-center">
                    <svg class="cursor-pointer" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-blue-600 group-hover:fill-white"
                            d="M9.53414 8.15675L8.96459 7.59496L9.53414 8.15675ZM13.8911 3.73968L13.3215 3.17789L13.8911 3.73968ZM16.3154 3.75892L15.7367 4.31126L16.3154 3.75892ZM16.38 3.82658L16.9587 3.27423L16.38 3.82658ZM16.3401 6.13595L15.7803 5.56438L16.3401 6.13595ZM11.9186 10.4658L12.4784 11.0374L11.9186 10.4658ZM11.1223 10.9017L10.9404 10.1226L11.1223 10.9017ZM9.07259 10.9951L8.52556 11.5788L9.07259 10.9951ZM9.09713 8.9664L9.87963 9.1328L9.09713 8.9664ZM9.05721 10.9803L8.49542 11.5498L9.05721 10.9803ZM17.1679 4.99458L16.368 4.98075L17.1679 4.99458ZM15.1107 2.8693L15.1171 2.06932L15.1107 2.8693Z"
                            fill="#818CF8"></path>
                    </svg>
                </button>
            </a>
        </div>
    
        <div>
            @if (!empty($profile->photo_url) && \Storage::disk('public')->exists($profile->photo_url))
                <!-- Display profile photo -->
                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32 w-32"
                        src="{{ asset('storage/' . $profile->photo_url) }}" alt="{{ $profile->name }}">
                </div>
            @else
                <!-- Display avatar with the user's initial -->
                <div
                    class="flex items-center justify-center mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <div
                        class="w-32 h-32 rounded-full flex items-center justify-center bg-blue-500 text-white text-4xl font-bold uppercase">
                        <span>{{ $nameUser }}</span>
                    </div>
                </div>
            @endif
        </div>
    
        <div class="text-center mt-2">
            <h2 class="font-semibold">{{ $profile->name }}</h2>
            <p class="text-gray-500">{{ $profile->title ?? 'Job Title Not Available' }}</p>
            <p class="text-gray-500">{{ $profile->bio ?? 'Description Not Available' }}</p>
        </div>
        <ul class="mb-6 md:mb-0 mx-2">
            @if ($profile->address)
                <li class="flex my-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    
@endsection
