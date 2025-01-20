@extends('/layout')

@section('title', 'Profile Details')

@section('content')

    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Section Profil -->
            <div class="bg-white shadow-xl rounded-lg text-gray-900">
                <div class="w-full h-40 rounded-lg text-center text-white flex items-center justify-center shadow-lg"
                    style="background-color: {{ $profile->background_color }};">
                </div>
                @if (!empty($profile->photo_url) && \Storage::disk('public')->exists($profile->photo_url))
                    <!-- Display profile photo -->
                    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center h-32 w-32" src="{{ asset('storage/' . $profile->photo_url) }}"
                            alt="{{ $profile->name }}">
                    </div>
                @else
                    <!-- Display avatar with the user's initial -->
                    <div class="flex items-center justify-center mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                        <div class="w-32 h-32 rounded-full flex items-center justify-center bg-blue-500 text-white text-4xl font-bold uppercase">
                            <span>{{ $nameUser }}</span>
                            <img id="profilePhotoTemplate" class="hidden object-cover w-full h-full rounded-full"
                                alt="Profile Photo">
                        </div>
                    </div>
                @endif


                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32 w-32 "
                        src="{{ asset('storage/' . $profile->photo_url ?? 'default-photo.png') }}"
                        alt="{{ $profile->name }}">
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
                            <div class="ml-4 mb-4">
                                <a href="https://www.google.com/maps?q={{ urlencode($profile->address) }}" target="_blank">
                                    <p class="text-gray-600 dark:text-slate-400" id="address_">{{ $profile->address }}</p>
                                </a>
                            </div>
                        </li>
                    @endif
                    @if ($profile->email)
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                                    <path
                                        d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <a href="mailto:{{ $profile->email }}">
                                    <p class="text-gray-600 dark:text-slate-400" id="email_">{{ $profile->email }}</p>
                                </a>

                            </div>
                        </li>
                    @endif
                    @if ($profile->phone)
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <a href="tel:{{ $profile->phone }}">
                                    <p class="text-gray-600 dark:text-slate-400" id="phone_">{{ $profile->phone }}</p>
                                </a>

                            </div>
                        </li>
                    @endif

                </ul>
                <ul class="py-4 mt-2 text-gray-700 flex items-center justify-center space-x-6">
                    @if ($profile->facebook)
                        <li>
                            <a href="{{ $profile->facebook }}" target="_blank">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/Facebook_Logo_2023.png"
                                    alt="Facebook" class="w-8 h-8">
                            </a>
                        </li>
                    @endif
                    @if ($profile->instagram)
                        <li>
                            <a href="{{ $profile->instagram }}" target="_blank">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"
                                    alt="Instagram" class="w-8 h-8">
                            </a>
                        </li>
                    @endif
                    @if ($profile->whatsapp)
                        <li>
                            <a href="{{ $profile->whatsapp }}" target="_blank">
                                <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000" alt="WhatsApp"
                                    class="w-8 h-8">
                            </a>
                        </li>
                    @endif
                    @if ($profile->linkedin)
                        <li>
                            <a href="{{ $profile->linkedin }}" target="_blank">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png"
                                    alt="LinkedIn" class="w-8 h-8">
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="p-4 border-t mx-8 mt-2 flex justify-between">
                    <button
                        class="w-1/2 block mx-2 rounded-lg bg-gray-400 hover:shadow-lg font-semibold text-white px-6 py-2 ">
                        Add to Contacts
                    </button>
                    <button
                        class="w-1/2 block mx-2 rounded-lg bg-blue-400 hover:shadow-lg font-semibold text-white px-6 py-2">
                        share my info
                    </button>
                </div>
            </div>

            <!-- Section QR Code -->
            <div class="bg-gray-900 text-white p-6 rounded-md space-y-6">

                <div class="flex items-start justify-center space-x-4">
                    <div class="w-32 h-32 bg-white flex items-center justify-center rounded-md">
                        @if ($profile->qr_code)
                            <img id="qr-code" src="{{ asset('storage/' . $profile->qr_code) }}" alt="Qr code"
                                class="w-28 h-28">
                        @endif
                    </div>
                </div>
                <div class="flex justify-between">
                    <button onclick="downloadQRCode('png')" class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                        Télécharger PNG
                    </button>
                    <button onclick="downloadQRCode('jpg')" class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                        Télécharger JPG
                    </button>
                    <button onclick="downloadAsPDF()" class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                        Télécharger PDF
                    </button>
                </div>
                <div class="relative w-full mx-auto">
                    <input type="text" value="{{ $profile->profile_link }}" id="profile-link"
                        class="w-full px-4 py-2 text-black rounded-md" readonly />
                    <button onclick="copyToClipboard()"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800"
                        title="Copier">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>
                <div id="copy-notification"
                    class="fixed bottom-36 right-96 bg-blue-500 text-white text-sm px-4 py-2 rounded shadow-lg hidden">
                    Lien copié !
                </div>
            </div>


        </div>
    </div>



    <!-- jsPDF Library -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


@endsection
