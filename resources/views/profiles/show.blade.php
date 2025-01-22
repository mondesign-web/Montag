@extends('/layout')

@section('title', 'Profile Details')

@section('content')

    <div class="container flex justify-center mx-auto mt-10">
        <!-- md:grid-cols-2 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10  ">
            <!-- Section Profil -->
            <div class="bg-white shadow-xl rounded-lg text-gray-900">
                <div class="w-full h-40 rounded-lg text-center text-white flex items-center justify-end shadow-lg"
                    style="background-color: {{ $profile->background_color }};">
                    <div class="mx-5">
                        <a href="{{ route('profiles.edit', $profile->id) }}">
                            <button
                                class="p-2  rounded-full bg-white group transition-all duration-500 hover:bg-blue-600 flex item-center">
                                <svg class="cursor-pointer" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-blue-600 group-hover:fill-white"
                                        d="M9.53414 8.15675L8.96459 7.59496L8.96459 7.59496L9.53414 8.15675ZM13.8911 3.73968L13.3215 3.17789V3.17789L13.8911 3.73968ZM16.3154 3.75892L15.7367 4.31126L15.7367 4.31127L16.3154 3.75892ZM16.38 3.82658L16.9587 3.27423L16.9587 3.27423L16.38 3.82658ZM16.3401 6.13595L15.7803 5.56438L16.3401 6.13595ZM11.9186 10.4658L12.4784 11.0374L11.9186 10.4658ZM11.1223 10.9017L10.9404 10.1226V10.1226L11.1223 10.9017ZM9.07259 10.9951L8.52556 11.5788L8.52556 11.5788L9.07259 10.9951ZM9.09713 8.9664L9.87963 9.1328V9.1328L9.09713 8.9664ZM9.05721 10.9803L8.49542 11.5498H8.49542L9.05721 10.9803ZM17.1679 4.99458L16.368 4.98075V4.98075L17.1679 4.99458ZM15.1107 2.8693L15.1171 2.06932L15.1107 2.8693ZM9.22851 8.51246L8.52589 8.12992L8.52452 8.13247L9.22851 8.51246ZM9.22567 8.51772L8.52168 8.13773L8.5203 8.1403L9.22567 8.51772ZM11.5684 10.7654L11.9531 11.4668L11.9536 11.4666L11.5684 10.7654ZM11.5669 10.7662L11.9507 11.4681L11.9516 11.4676L11.5669 10.7662ZM11.3235 3.30005C11.7654 3.30005 12.1235 2.94188 12.1235 2.50005C12.1235 2.05822 11.7654 1.70005 11.3235 1.70005V3.30005ZM18.3 9.55887C18.3 9.11705 17.9418 8.75887 17.5 8.75887C17.0582 8.75887 16.7 9.11705 16.7 9.55887H18.3ZM3.47631 16.5237L4.042 15.9581H4.042L3.47631 16.5237ZM16.5237 16.5237L15.958 15.9581L15.958 15.9581L16.5237 16.5237ZM10.1037 8.71855L14.4606 4.30148L13.3215 3.17789L8.96459 7.59496L10.1037 8.71855ZM15.7367 4.31127L15.8013 4.37893L16.9587 3.27423L16.8941 3.20657L15.7367 4.31127ZM15.7803 5.56438L11.3589 9.89426L12.4784 11.0374L16.8998 6.70753L15.7803 5.56438ZM10.9404 10.1226C10.3417 10.2624 9.97854 10.3452 9.72166 10.3675C9.47476 10.3888 9.53559 10.3326 9.61962 10.4113L8.52556 11.5788C8.9387 11.966 9.45086 11.9969 9.85978 11.9615C10.2587 11.9269 10.7558 11.8088 11.3042 11.6807L10.9404 10.1226ZM8.31462 8.8C8.19986 9.33969 8.09269 9.83345 8.0681 10.2293C8.04264 10.6393 8.08994 11.1499 8.49542 11.5498L9.619 10.4107C9.70348 10.494 9.65043 10.5635 9.66503 10.3285C9.6805 10.0795 9.75378 9.72461 9.87963 9.1328L8.31462 8.8ZM9.61962 10.4113C9.61941 10.4111 9.6192 10.4109 9.619 10.4107L8.49542 11.5498C8.50534 11.5596 8.51539 11.5693 8.52556 11.5788L9.61962 10.4113ZM15.8013 4.37892C16.0813 4.67236 16.2351 4.83583 16.3279 4.96331C16.4073 5.07234 16.3667 5.05597 16.368 4.98075L17.9678 5.00841C17.9749 4.59682 17.805 4.27366 17.6213 4.02139C17.451 3.78756 17.2078 3.53522 16.9587 3.27423L15.8013 4.37892ZM16.8998 6.70753C17.1578 6.45486 17.4095 6.21077 17.5876 5.98281C17.7798 5.73698 17.9607 5.41987 17.9678 5.00841L16.368 4.98075C16.3693 4.90565 16.4103 4.8909 16.327 4.99749C16.2297 5.12196 16.0703 5.28038 15.7803 5.56438L16.8998 6.70753ZM14.4606 4.30148C14.7639 3.99402 14.9352 3.82285 15.0703 3.71873C15.1866 3.62905 15.1757 3.66984 15.1044 3.66927L15.1171 2.06932C14.6874 2.06591 14.3538 2.25081 14.0935 2.45151C13.8518 2.63775 13.5925 2.9032 13.3215 3.17789L14.4606 4.30148ZM16.8941 3.20657C16.6279 2.92765 16.373 2.65804 16.1345 2.46792C15.8774 2.26298 15.5468 2.07273 15.1171 2.06932L15.1044 3.66927C15.033 3.66871 15.0226 3.62768 15.1372 3.71904C15.2704 3.82522 15.4387 3.999 15.7367 4.31126L16.8941 3.20657ZM8.96459 7.59496C8.82923 7.73218 8.64795 7.90575 8.5259 8.12993L9.93113 8.895C9.92075 8.91406 9.91465 8.91711 9.93926 8.88927C9.97002 8.85445 10.0145 8.80893 10.1037 8.71854L8.96459 7.59496ZM9.87963 9.1328C9.9059 9.00925 9.91925 8.94785 9.93124 8.90366C9.94073 8.86868 9.94137 8.87585 9.93104 8.89515L8.5203 8.1403C8.39951 8.36605 8.35444 8.61274 8.31462 8.8L9.87963 9.1328ZM8.52452 8.13247L8.52168 8.13773L9.92967 8.89772L9.9325 8.89246L8.52452 8.13247ZM11.3589 9.89426C11.27 9.98132 11.2252 10.0248 11.1909 10.055C11.1635 10.0791 11.1658 10.0738 11.1832 10.0642L11.9536 11.4666C12.1727 11.3462 12.3427 11.1703 12.4784 11.0374L11.3589 9.89426ZM11.3042 11.6807C11.4912 11.6371 11.7319 11.5878 11.9507 11.4681L11.1831 10.0643C11.2007 10.0547 11.206 10.0557 11.1697 10.0663C11.1248 10.0793 11.0628 10.0941 10.9404 10.1226L11.3042 11.6807ZM11.1837 10.064L11.1822 10.0648L11.9516 11.4676L11.9531 11.4668L11.1837 10.064ZM16.399 6.10097L13.8984 3.60094L12.7672 4.73243L15.2677 7.23246L16.399 6.10097ZM10.8333 16.7001H9.16667V18.3001H10.8333V16.7001ZM3.3 10.8334V9.16672H1.7V10.8334H3.3ZM9.16667 3.30005H11.3235V1.70005H9.16667V3.30005ZM16.7 9.55887V10.8334H18.3V9.55887H16.7ZM9.16667 16.7001C7.5727 16.7001 6.45771 16.6984 5.61569 16.5851C4.79669 16.475 4.35674 16.2728 4.042 15.9581L2.91063 17.0894C3.5722 17.751 4.40607 18.0369 5.4025 18.1709C6.37591 18.3018 7.61793 18.3001 9.16667 18.3001V16.7001ZM1.7 10.8334C1.7 12.3821 1.6983 13.6241 1.82917 14.5976C1.96314 15.594 2.24905 16.4279 2.91063 17.0894L4.042 15.9581C3.72726 15.6433 3.52502 15.2034 3.41491 14.3844C3.3017 13.5423 3.3 12.4273 3.3 10.8334H1.7ZM10.8333 18.3001C12.3821 18.3001 13.6241 18.3018 14.5975 18.1709C15.5939 18.0369 16.4278 17.751 17.0894 17.0894L15.958 15.9581C15.6433 16.2728 15.2033 16.475 14.3843 16.5851C13.5423 16.6984 12.4273 16.7001 10.8333 16.7001V18.3001ZM16.7 10.8334C16.7 12.4274 16.6983 13.5423 16.5851 14.3844C16.475 15.2034 16.2727 15.6433 15.958 15.9581L17.0894 17.0894C17.7509 16.4279 18.0369 15.594 18.1708 14.5976C18.3017 13.6241 18.3 12.3821 18.3 10.8334H16.7ZM3.3 9.16672C3.3 7.57275 3.3017 6.45776 3.41491 5.61574C3.52502 4.79674 3.72726 4.35679 4.042 4.04205L2.91063 2.91068C2.24905 3.57225 1.96314 4.40612 1.82917 5.40255C1.6983 6.37596 1.7 7.61798 1.7 9.16672H3.3ZM9.16667 1.70005C7.61793 1.70005 6.37591 1.69835 5.4025 1.82922C4.40607 1.96319 3.5722 2.24911 2.91063 2.91068L4.042 4.04205C4.35674 3.72731 4.79669 3.52507 5.61569 3.41496C6.45771 3.30175 7.5727 3.30005 9.16667 3.30005V1.70005Z"
                                        fill="#818CF8"></path>
                                </svg>
                            </button>
                        </a>
                    </div>

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




                <div class="text-center mt-3 mx-8">
                    <h2 class="font-semibold">{{ $profile->name }}</h2>
                    <p class="text-gray-500">{{ $profile->title ?? 'Job Title Not Available' }}</p>
                    <div>
                        <p class="text-gray-500 leading-relaxed">{{ $profile->bio ?? 'Description Not Available' }}</p>
                    </div>

                </div>
                <ul class="mb-6 md:mb-0 mx-5">
                    @if ($profile->address)
                        <li class="flex my-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded text-gray-50"
                                style="background-color: {{ $profile->background_color }};">
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
                            <div class="flex h-8 w-8 items-center justify-center rounded  text-gray-50"
                                style="background-color: {{ $profile->background_color }};">
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
                            <div class="flex h-8 w-8 items-center justify-center rounded text-gray-50"
                                style="background-color: {{ $profile->background_color }};">
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
                <div class="p-4 border-t mx-8 my-4 flex justify-center items-center space-x-4 ">
                    <!-- Bouton Add to Contacts -->
                    <a href="{{ route('profiles.vcard', $profile->id) }}" class="w-full sm:w-1/3">
                        <button class="w-full rounded-lg bg-gray-400 hover:shadow-lg font-semibold text-white px-6 py-2">
                            Add to Contacts
                        </button>
                    </a>

                    <!-- Bouton Share My Profile -->
                    <button id="share-button"
                        class="w-full sm:w-1/3 rounded-lg bg-blue-400 hover:shadow-lg font-semibold text-white px-6 py-2">
                        Share My Profile
                    </button>
                </div>

            </div>

            <!-- Section QR Code -->
            <div class=" text-white p-6 rounded-md space-y-6 bg-gray-900">

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
                <!--button
                                    class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700"
                                    onclick="openModal('modelConfirm')">
                                    <svg aria-hidden="true" class="w-4 h-4 me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                        </path>
                                    </svg>
                                    Share link
                                </button>

                                <div id="modelConfirm"
                                    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                                    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                                        <div class="flex justify-end p-2">
                                            <button onclick="closeModal('modelConfirm')" type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="p-6 pt-0 text-center">
                                            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this
                                                user?</h3>
                                            <a href="#" onclick="closeModal('modelConfirm')"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </a>
                                            <a href="#" onclick="closeModal('modelConfirm')"
                                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                                data-modal-toggle="delete-user-modal">
                                                No, cancel
                                            </a>
                                        </div>

                                    </div>
                                </div-->



                <div id="copy-notification"
                    class="fixed bottom-36 right-96 bg-blue-500 text-white text-sm px-4 py-2 rounded shadow-lg hidden">
                    Lien copié !
                </div>
            </div>


        </div>
    </div>




    <!-- jsPDF Library -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!--script type="text/javascript">
                    window.openModal = function(modalId) {
                        document.getElementById(modalId).style.display = 'block'
                        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                    }

                    window.closeModal = function(modalId) {
                        document.getElementById(modalId).style.display = 'none'
                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                    }

                    // Close all modals when press ESC
                    document.onkeydown = function(event) {
                        event = event || window.event;
                        if (event.keyCode === 27) {
                            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                            let modals = document.getElementsByClassName('modal');
                            Array.prototype.slice.call(modals).forEach(i => {
                                i.style.display = 'none'
                            })
                        }
                    };
                </script-->

    <script>
        document.getElementById('share-button').addEventListener('click', function() {
            const profileUrl = "{{ route('profiles.show', $profile->id) }}"; // Replace with your profile URL
            const profileTitle = "{{ $profile->name }}'s Profile";
            const profileText = "Check out my profile on this amazing platform!";

            if (navigator.share) {
                navigator
                    .share({
                        title: profileTitle,
                        text: profileText,
                        url: profileUrl,
                    })
                    .then(() => console.log('Profile shared successfully!'))
                    .catch((error) => console.error('Error sharing profile:', error));
            } else {
                alert('Sharing is not supported on your browser.');
            }
        });
    </script>

@endsection
