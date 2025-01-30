@extends('/layout')

@section('title', 'Edit Profile')

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
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4 py-8">
            @csrf
            @method('PUT')

            <!-- Étape 1 : Informations personnelles -->
            <div class="col-span-4 sm:col-span-8 tab-content block">
                <h2 class="text-lg font-bold mb-4">Step 1: Personal Info</h2>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="username">Full
                        Name</label>
                    <input name="name" id="name" type="text" value="{{ $profile->name }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('fullName', this.value)">
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ $profile->title }}"
                        class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('poste', this.value)">
                </div>

                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea name="bio" id="bio" rows="7"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('description', this.value)">{{ $profile->bio }}</textarea>

                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Profile Photo
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex items-center text-sm text-gray-600">
                                <div class="mt-2 flex items-center">
                                    <!-- Label stylisé comme bouton -->
                                    <label for="photo"
                                        class="cursor-pointer inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Choisir un fichier
                                    </label>
                                    <!-- Nom du fichier sélectionné -->
                                    <span id="file-name" class="ml-3 text-gray-600">{{ $profile->photo_url }}</span>
                                    <!-- Input caché -->
                                    <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
                                        value="{{ $profile->photo_url }}"
                                        onchange="previewPhoto(event); document.getElementById('file-name').textContent = this.files.length > 0 ? this.files[0].name : 'Aucun fichier choisi';"
                                        oninput="updatePreview('profilePhotoPreview', this.value)" />
                                </div>
                            </div>
                            <p class="text-xs text-gray-700 pt-3">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
                <button type="button" class="next-step px-4 py-2 bg-blue-600 text-white rounded">Next</button>
            </div>

            <!-- Étape 2 : Personnalisation -->
            <div class="col-span-4 sm:col-span-8 tab-content hidden">
                <h2 class="text-lg font-bold mb-4">Step 2: Contact Details</h2>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="email">Email</label>
                    <input name="email" id="email" type="email" value="{{ $profile->email }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('email_', this.value)" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200"
                        for="username">Téléphone</label>
                    <input name="phone" id="phone" type="tel" value="{{ $profile->phone }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('phone_', this.value)" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200"
                        for="username">Adresse</label>
                    <input name="address" id="address" type="text" value="{{ $profile->address }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        oninput="updatePreview('address_', this.value)" required>
                </div>
                <!-- Champs pour les réseaux sociaux -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Social Media Links</label>

                    <input name="facebook" type="url" value="{{ $socialLinks->facebook ?? '' }}"
                        placeholder="Facebook URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="instagram" type="url" value="{{ $socialLinks->instagram ?? '' }}"
                        placeholder="Instagram URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="whatsapp" type="url" value="{{ $socialLinks->whatsapp ?? '' }}"
                        placeholder="WhatsApp URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="linkedin" type="url" value="{{ $socialLinks->linkedin ?? '' }}"
                        placeholder="LinkedIn URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="snapchat" type="url" value="{{ $socialLinks->snapchat ?? '' }}"
                        placeholder="Snapchat URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="twitter" type="url" value="{{ $socialLinks->twitter ?? '' }}"
                        placeholder="Twitter URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="telegram" type="url" value="{{ $socialLinks->telegram ?? '' }}"
                        placeholder="Telegram URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="tiktok" type="url" value="{{ $socialLinks->tiktok ?? '' }}"
                        placeholder="TikTok URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="pinterest" type="url" value="{{ $socialLinks->pinterest ?? '' }}"
                        placeholder="Pinterest URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="behance" type="url" value="{{ $socialLinks->behance ?? '' }}"
                        placeholder="Behance URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="youtube" type="url" value="{{ $socialLinks->youtube ?? '' }}"
                        placeholder="YouTube URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="discord" type="url" value="{{ $socialLinks->discord ?? '' }}"
                        placeholder="Discord URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">

                    <input name="dribbble" type="url" value="{{ $socialLinks->dribbble ?? '' }}"
                        placeholder="Dribbble URL"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div class="mb-4">
                    <!--label for="background_color" class="block text-sm font-medium text-gray-700">Background Color</label>
                                                                                                                                    <input type="color" id="background_color" name="background_color"
                                                                                                                                        class="block w-16 h-10 border rounded-md"-->
                    <label for="backgroundColorInput" class="block text-sm font-medium text-gray-700">
                        Choisissez une couleur pour le fond du profil :
                    </label>
                    <input id="backgroundColorInput" type="color" name="background_color"
                        class="mt-1 block w-16 h-10 cursor-pointer border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="#111827" />
                </div>
                <button type="button" class="prev-step px-4 py-2 bg-gray-600 text-white rounded">Previous</button>
                <button type="button" class="next-step px-4 py-2 bg-blue-600 text-white rounded">Next</button>
            </div>

            <!-- Étape 3 : Réglages -->
            <div class="col-span-4 sm:col-span-8 tab-content hidden">
                <h2 class="text-lg font-bold mb-4">Step 3: Setup</h2>
                <div class="mb-4">
                    <label for="nfc_tag_id" class="block text-sm font-medium text-gray-700">NFC Tag ID</label>
                    <input name="nfc_tag_id" id="nfc_tag_id" type="text"
                        class="block w-full px-4 py-2 border rounded-md" value="{{ $profile->nfc_tag_id }}">
                </div>
                <div class="border-dashed border-2 p-6 my-6 border-gray-300 rounded-md">
                    <h3 class="text-lg font-semibold mb-4">Ajouter vos liens et pdfs</h3>

                    <!-- Add Links -->
                    <div>
                        @if ($documents->where('type', 'link')->isNotEmpty())
                            @foreach ($documents->where('type', 'link') as $link)
                                <!-- Affiche les liens existants avec un bouton "-" -->
                                <div class="flex items-center space-x-4 mt-2">
                                    <input type="url" name="links[]" placeholder="https://example.com"
                                        class="w-full border px-4 py-2 rounded border-gray-300"
                                        value="{{ $link->content }}" />
                                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                                        onclick="removeInput(this)">-</button>
                                </div>
                            @endforeach
                        @endif

                        <!-- Affiche un input vide avec un bouton "+" pour ajouter un nouveau lien -->
                        <div class="flex items-center space-x-4 mt-2">
                            <input type="url" name="links[]" placeholder="https://example.com"
                                class="w-full border px-4 py-2 rounded border-gray-300" />
                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded"
                                onclick="addLinkInput()">+</button>
                        </div>

                        <!-- Container pour les liens supplémentaires -->
                        <div id="additional-links"></div>
                    </div>

                    <div class="mt-4">
                        <label for="file" class="block text-sm font-medium">Ajouter un document (PDF
                            uniquement):</label>

                        <!-- Documents existants -->
                        @forelse($documents->where('type', 'document') as $document)
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-700">
                                    {{ $document->content }}
                                </span>
                                <button type="button" onclick="removeExistingDocument({{ $document->id }}, this)"
                                    class="bg-red-500 text-white px-[14px] py-3 rounded"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg>
                                </button>
                            </div>
                        @empty
                            <p class="text-red-500 text-sm my-3">Aucun document existant.</p>
                        @endforelse



                        <!-- Ajouter un nouveau document -->
                        <div class="flex items-center space-x-4 mt-2">
                            <!--input type="file" name="documents[]" id="file"
                                    class="w-full border px-4 py-2 rounded" oninput="updatePreview('pdf_', this.value)" /-->
                            <input type="file" name="documents[]" id="file"
                                class="w-full border px-4 py-2 rounded" accept="application/pdf"
                                onchange="validatePDFType(this)" oninput="updatePreview('pdf_', this.value)" />
                            <button type="button" onclick="addDocumentInput()"
                                class="bg-blue-500 text-white px-4 py-2 rounded">+</button>
                        </div>
                        <div id="additional-documents"></div>
                    </div>

                    <div class="mt-4">
                        <!-- Input pour edité gallery -->
                        <div class="flex items-center space-x-4 mt-2">
                            <div
                                class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                <div class="grid grid-cols-2 gap-2">
                                    @forelse($documents->where('type', 'gallery') as $gallery)
                                        <div class="flex justify-start items-start">
                                            <button type="button" onclick="removeGalleryItem({{ $gallery->id }}, this)"
                                                class="bg-red-500 text-white px-[14px] py-3 rounded"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg>
                                            </button>
                                            <img class="object-cover object-center h-40 max-w-full rounded-lg md:h-60"
                                                src="{{ asset('storage/' . $gallery->content) }}"
                                                alt="{{ $gallery->content }}" />
                                        </div>
                                    @empty
                                        <p class="text-red-500 text-sm my-3">Aucun gallery</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="gallery">Ajouter des images à la galerie :</label>
                            <input type="file" name="gallery[]" id="gallery" multiple accept="image/*">
                        </div>

                    </div>
                </div>
                <button type="button" class="prev-step px-4 py-2 bg-gray-600 text-white rounded">Previous</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Submit</button>
            </div>

            <!-- Apercu -->
            <div class="col-span-4 sm:col-span-4">
                <div
                    class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
                    <div id="profileTemplate"
                        class="w-full h-40 rounded-lg text-center text-white flex items-center justify-center shadow-lg"
                        style="background-color: #111827;">

                    </div>
                    <div class="mb-4">

                        @if (!empty($profile->photo_url) && \Storage::disk('public')->exists($profile->photo_url))
                            <!-- Display profile photo -->
                            <div
                                class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
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
                    <!--div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                                                                                                                    <img class="object-cover object-center h-32" id="profilePhotoTemplate"
                                                                                                                        src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                                                                                                                        alt='Woman looking front'>
                                                                                                                </div-->
                    <div class="text-center mt-2">
                        <h2 class="font-semibold" id="fullName">{{ $profile->name }}</h2>
                        <p class="text-gray-500" id="poste">{{ $profile->title }}</p>
                        <p class="text-gray-500" id="description"> {{ $profile->bio }}</p>
                    </div>
                    <ul class="mb-6 md:mb-0 mx-2">
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">

                                <p class="text-gray-600 dark:text-slate-400" id="address_">{{ $profile->address }}

                            </div>
                        </li>
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                                    <path
                                        d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <p class="text-gray-600 dark:text-slate-400" id="email_">Mail: {{ $profile->email }}
                                </p>
                            </div>
                        </li>
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <p class="text-gray-600 dark:text-slate-400" id="phone_">Phone: {{ $profile->phone }}
                                </p>
                            </div>
                        </li>

                        @if ($documents->where('type', 'link')->isNotEmpty())
                            @foreach ($documents->where('type', 'link') as $link)
                                <li class="flex my-2">
                                    <div class="flex h-8 w-8 items-center justify-center rounded text-white bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-browser-edge" viewBox="0 0 16 16">
                                            <path
                                                d="M9.482 9.341c-.069.062-.17.153-.17.309 0 .162.107.325.3.456.877.613 2.521.54 2.592.538h.002c.667 0 1.32-.18 1.894-.519A3.84 3.84 0 0 0 16 6.819c.018-1.316-.44-2.218-.666-2.664l-.04-.08C13.963 1.487 11.106 0 8 0A8 8 0 0 0 .473 5.29C1.488 4.048 3.183 3.262 5 3.262c2.83 0 5.01 1.885 5.01 4.797h-.004v.002c0 .338-.168.832-.487 1.244l.006-.006z" />
                                            <path
                                                d="M.01 7.753a8.14 8.14 0 0 0 .753 3.641 8 8 0 0 0 6.495 4.564 5 5 0 0 1-.785-.377h-.01l-.12-.075a5.5 5.5 0 0 1-1.56-1.463A5.543 5.543 0 0 1 6.81 5.8l.01-.004.025-.012c.208-.098.62-.292 1.167-.285q.194.001.384.033a4 4 0 0 0-.993-.698l-.01-.005C6.348 4.282 5.199 4.263 5 4.263c-2.44 0-4.824 1.634-4.99 3.49m10.263 7.912q.133-.04.265-.084-.153.047-.307.086z" />
                                            <path
                                                d="M10.228 15.667a5 5 0 0 0 .303-.086l.082-.025a8.02 8.02 0 0 0 4.162-3.3.25.25 0 0 0-.331-.35q-.322.168-.663.294a6.4 6.4 0 0 1-2.243.4c-2.957 0-5.532-2.031-5.532-4.644q.003-.203.046-.399a4.54 4.54 0 0 0-.46 5.898l.003.005c.315.441.707.821 1.158 1.121h.003l.144.09c.877.55 1.721 1.078 3.328.996" />
                                        </svg>
                                    </div>
                                    <div class="ml-4 mb-4">
                                        <a href="{{ $link->content }}" target="_blank">
                                            <p class="text-gray-600 dark:text-slate-400 "> {{ $link->content }} </p>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p class="text-gray-500"></p>
                        @endif


                        @forelse($documents->where('type', 'document') as $index => $document)
                            <li class="flex my-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded text-white bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                        <path fill-rule="evenodd"
                                            d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <!--a href="{{ asset('storage/' . $document->content) }}" target="_blank" -->
                                    <button class="text-gray-600 dark:text-slate-400" onclick="downloadAsPDF()">
                                        document-{{ $index + 1 }}.pdf
                                    </button>
                                </div>

                            </li>
                        @empty
                            <p></p>
                        @endforelse

                    </ul>
                    <!-- Social Media Preview Section -->
                    <!--ul id="social-preview" class="py-4 mt-2 text-gray-700 flex items-center justify-center space-x-5">
                                                                                                       Dynamically added icons will appear here
                                                                                                    </ul-->

                    <ul class="py-4 mt-2 text-gray-700 flex items-center justify-center space-x-5">
                        @if ($profile->facebook)
                            <li class="flex flex-col items-center justify-around">
                                <a href="#" id="preview-facebook" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 48 48">
                                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                        <path fill="#fff"
                                            d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($profile->whatsapp)
                            <li class="flex flex-col items-center justify-between">
                                <a href="#" id="preview-whatsapp" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                                        viewBox="0 0 48 48">
                                        <path fill="#fff"
                                            d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                                        </path>
                                        <path fill="#fff"
                                            d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                                        </path>
                                        <path fill="#cfd8dc"
                                            d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                                        </path>
                                        <path fill="#40c351"
                                            d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                                        </path>
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($profile->linkedin)
                            <li class="flex flex-col items-center justify-around">
                                <a href="#" id="preview-linkedin" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 48 48">
                                        <path fill="#0288D1"
                                            d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z">
                                        </path>
                                        <path fill="#FFF"
                                            d="M12 19H17V36H12zM14.485 17h-.028C12.965 17 12 15.888 12 14.499 12 13.08 12.995 12 14.514 12c1.521 0 2.458 1.08 2.486 2.499C17 15.887 16.035 17 14.485 17zM36 36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698-1.501 0-2.313 1.012-2.707 1.99C24.957 25.543 25 26.511 25 27v9h-5V19h5v2.616C25.721 20.5 26.85 19 29.738 19c3.578 0 6.261 2.25 6.261 7.274L36 36 36 36z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if ($profile->instagram)
                            <li class="flex flex-col items-center justify-around">
                                <a href="#" id="preview-instagram" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 48 48">
                                        <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38"
                                            cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fd5"></stop>
                                            <stop offset=".328" stop-color="#ff543f"></stop>
                                            <stop offset=".348" stop-color="#fc5245"></stop>
                                            <stop offset=".504" stop-color="#e64771"></stop>
                                            <stop offset=".643" stop-color="#d53e91"></stop>
                                            <stop offset=".761" stop-color="#cc39a4"></stop>
                                            <stop offset=".841" stop-color="#c837ab"></stop>
                                        </radialGradient>
                                        <path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)"
                                            d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z">
                                        </path>
                                        <radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786"
                                            cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#4168c9"></stop>
                                            <stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop>
                                        </radialGradient>
                                        <path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)"
                                            d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z">
                                        </path>
                                        <path fill="#fff"
                                            d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z">
                                        </path>
                                        <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle>
                                        <path fill="#fff"
                                            d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        @endif

                    </ul>
                    <div class="p-4 border-t mx-8 mt-2">
                        <button
                            class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Contact</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        /* function addLinkInput() {
                                                const addLink = document.getElementById('additional-links');

                                                const inputWrapper = document.createElement('div');
                                                inputWrapper.className = 'flex items-center space-x-4 mt-2';
                                                inputWrapper.innerHTML = `
                <input type="url" name="links[]" id="content-link" placeholder="https://example.com"
                                class="w-full border px-4 py-2 rounded" 
                                 />
                                 <button type="button" onclick="removeInput(this)"
                class="bg-red-500 text-white px-4 py-2 rounded">-</button>
                            
            `;
                                                addLink.appendChild(inputWrapper);
                                            }
                                    */

        function addDocumentInput() {
            const addDocument = document.getElementById('additional-documents');

            const inputDocument = document.createElement('div');
            inputDocument.className = 'flex items-center space-x-4 mt-2';
            inputDocument.innerHTML = `
               <input type="file" name="documents[]" id="file"
                                class="w-full border px-4 py-2 rounded"  />
                                 <button type="button" onclick="removeInput(this)"
                class="bg-red-500 text-white px-4 py-2 rounded">-</button>
                            
            `;
            addDocument.appendChild(inputDocument)
        }
        /*
                function removeInput(button) {
                    button.parentElement.remove();
                }
                    */

        function addLinkInput() {
            const additionalLinks = document.getElementById('additional-links');

            // Créer un nouveau conteneur d'input
            const newInput = document.createElement('div');
            newInput.className = 'flex items-center space-x-4 mt-2';

            // Ajouter un input et un bouton "-" pour le supprimer
            newInput.innerHTML = `
        <input type="url" name="links[]" placeholder="https://example.com"
            class="w-full border px-4 py-2 rounded border-gray-300" />
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="removeInput(this)">-</button>
    `;

            // Ajouter le nouvel input dans le conteneur
            additionalLinks.appendChild(newInput);
        }

        function removeInput(button) {
            // Supprimer l'input associé au bouton "-"
            button.parentElement.remove();
        }


        function removeExistingDocument(documentId, button) {
            // Envoyer une requête AJAX pour supprimer le document côté serveur
            fetch(`/documents/${documentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Supprimer l'élément de l'interface si la suppression est réussie
                        button.parentElement.remove();
                    } else {
                        alert('Une erreur s\'est produite lors de la suppression du document.');
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression:', error);
                });
        }

        function removeGalleryItem(galleryId, button) {

            fetch(`/gallery/${galleryId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                .then(response => {
                    if (response.ok) {
                        //supprime l'element de gallerie
                        button.parentElement.remove();
                    } else {
                        alert('Une erreur s\'est produite lors de la suppression du image.')
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression: ', error);
                });
        }
    </script>
@endsection
