@extends('/layout')

@section('title', 'Create Profile')

@section('content')

    <div class="container mx-auto">

        <!-- Onglets pour les étapes -->
        <div class="border-b border-gray-200 px-4 pt-6">
            <nav class="flex justify-between" id="tabs">
                <button
                    class="flex items-center tab-btn px-1 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent active-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <p class="pl-2"> Step 1 : Personal Info </p>
                </button>
                <button
                    class="flex items-center tab-btn px-1 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-palette-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07M8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3M5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                    </svg>
                    <p class="pl-2"> Step 2 : Contact Details </p>
                </button>
                <button
                    class="flex items-center tab-btn px-1 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <p class="pl-2"> Step 3: Setup </p>
                </button>
            </nav>
        </div>

        <!-- Formulaire global -->
        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4 py-8">
            @csrf

            <!-- Étape 1 : Informations personnelles -->
            <div class="col-span-4 sm:col-span-8 tab-content block">
                <h2 class="text-lg font-bold mb-4">Step 1: Personal Info</h2>
                
                <!-- Conteneur de l'avatar -->
                <div class="flex items-center justify-center mb-6">
                    <div id="avatar-container" class="w-32 h-32 rounded-full flex items-center justify-center bg-blue-500 text-white text-4xl font-bold uppercase">
                        <span id="avatar-initial"></span>
                        <img id="profile-photo-preview" class="hidden object-cover w-full h-full rounded-full" alt="Profile Photo">
                    </div>
                </div>

                <!-- Champ nom avec génération d'initiales -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="name">Full Name</label>
                    <input name="name" id="name" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updateAvatarInitial(this.value)" required>
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <!-- Champ d'upload d'image -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
                            onchange="previewPhoto(event)" />
                        <button type="button" onclick="document.getElementById('photo').click();"
                            class="px-4 py-2 bg-blue-600 text-white rounded">Choose File</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        function updateAvatarInitial(name) {
            const avatarInitial = document.getElementById('avatar-initial');
            const profilePhoto = document.getElementById('profile-photo-preview');
            
            if (name) {
                avatarInitial.textContent = name.charAt(0).toUpperCase();
                avatarInitial.classList.remove('hidden');
                profilePhoto.classList.add('hidden');
            } else {
                avatarInitial.textContent = '';
            }
        }

        function previewPhoto(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                const profilePhoto = document.getElementById('profile-photo-preview');
                const avatarInitial = document.getElementById('avatar-initial');

                profilePhoto.src = e.target.result;
                profilePhoto.classList.remove('hidden');
                avatarInitial.classList.add('hidden');
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
