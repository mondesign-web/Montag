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

                    @if ($documents->where('type', 'link')->isNotEmpty())
                        @foreach ($documents->where('type', 'link') as $link)
                            <li class="flex my-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded text-white"
                                    style="background-color: {{ $profile->background_color }}">
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
                            <div class="flex h-8 w-8 items-center justify-center rounded text-white"
                                style="background-color: {{ $profile->background_color }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <!--a href="{{ asset('storage/' . $document->content) }}" target="_blank" -->
                                <button class="text-gray-600 dark:text-slate-400" onclick="downloadAsPDF()">
                                    Télécharger le document {{ $index + 1 }}
                                </button>
                            </div>

                        </li>
                    @empty
                        <p></p>
                    @endforelse
                </ul>
                <!-- Input pour edité gallery -->
                <div class="flex items-center space-x-4 mt-2">
                    <div
                        class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                        <div class="grid grid-cols-2 gap-2">
                            @forelse($documents->where('type', 'gallery') as $gallery)
                                @if (!empty($gallery->content) && \Storage::disk('public')->exists($gallery->content))
                                    <div>
                                        <img class="object-cover object-center h-40 max-w-full rounded-lg md:h-60"
                                            src="{{ asset('storage/' . $gallery->content) }}"
                                            alt="{{ $gallery->content }}" />

                                    </div>
                                @endif
                            @empty
                                <p class=""></p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <ul class="py-4 mt-2 text-gray-700 flex items-center justify-center space-x-6">

                    @if ($socialLink->facebook)
                        <li>
                            <a href="{{ $socialLink->facebook }}" target="_blank">
                                <img src="{{ asset('img/social_links/facebook.png') }}" alt="Facebook"
                                    class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->instagram)
                        <li>
                            <a href="{{ $socialLink->instagram }}" target="_blank">
                                <img src="{{ asset('img/social_links/instagram.png') }}" alt="whatsapp"
                                    class="w-11 h-11">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->whatsapp)
                        <li>
                            <a href="{{ $socialLink->whatsapp }}" target="_blank">
                                <img src="{{ asset('img/social_links/whatsapp.png') }}" alt="Instagram"
                                    class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->snapchat)
                        <li>
                            <a href="{{ $socialLink->snapchat }}" target="_blank">
                                <img src="{{ asset('img/social_links/snapchat.png') }}" alt="snapchat"
                                    class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->behance)
                        <li>
                            <a href="{{ $socialLink->behance }}" target="_blank">
                                <img src="{{ asset('img/social_links/behance.png') }}" alt="behance" class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->dribbble)
                        <li>
                            <a href="{{ $socialLink->dribbble }}" target="_blank">
                                <img src="{{ asset('img/social_links/dribbble.png') }}" alt="dribbble"
                                    class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->youtube)
                        <li>
                            <a href="{{ $socialLink->youtube }}" target="_blank">
                                <img src="{{ asset('img/social_links/youtube.png') }}" alt="youtube" class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->discord)
                        <li>
                            <a href="{{ $socialLink->discord }}" target="_blank">
                                <img src="{{ asset('img/social_links/discord.png') }}" alt="discord" class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->twiter)
                        <li>
                            <a href="{{ $socialLink->twiter }}" target="_blank">
                                <img src="{{ asset('img/social_links/twiter.png') }}" alt="twiter" class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->pinterest)
                        <li>
                            <a href="{{ $socialLink->pinterest }}" target="_blank">
                                <img src="{{ asset('img/social_links/pinterest.png') }}" alt="pinterest"
                                    class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->tiktok)
                        <li>
                            <a href="{{ $socialLink->tiktok }}" target="_blank">
                                <img src="{{ asset('img/social_links/tiktok.png') }}" alt="tiktok" class="w-10 h-10">
                            </a>
                        </li>
                    @endif
                    @if ($socialLink->telegram)
                        <li>
                            <a href="{{ $socialLink->telegram }}" target="_blank">
                                <img src="{{ asset('img/social_links/telegram.png') }}" alt="telegram"
                                    class="w-10 h-10">
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
                    <!--form action="{{ route('profiles.contactExchanged', $profile->id) }}" method="POST"-->

                    <button onclick="openModal('modelConfirm')"
                        class="w-full rounded-lg bg-red-400 hover:shadow-lg font-semibold text-white px-6 py-2">
                        Contact Exchanged
                    </button>
                    <!--/form-->

                    <!--div class="modal">
                                                    <div class="modal-content">
                                                        <img src="{{ asset('storage/' . $profile->photo_url) }}" alt="{{ $profile->name }}"
                                                            class="avatar">
                                                        <h2>Partager vos informations avec {{ $profile->name }}</h2>

                                                        <form action="{{ route('profiles.contactExchanged', $profile->id) }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="first_name" placeholder="Prénom" required
                                                                class="input-field">
                                                            <input type="text" name="last_name" placeholder="Nom" required class="input-field">
                                                            <input type="email" name="email" placeholder="Email" required class="input-field">
                                                            <input type="text" name="phone" placeholder="+212" class="input-field">
                                                            <button type="submit" class="btn">Partager</button>
                                                        </form>

                                                        <p class="hint">
                                                            Pressé(e)? Partagez une photo de votre carte de visite en quelques secondes.
                                                        </p>
                                                    </div>
                        </div-->



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

                            <div class="p-6 pt-0">
                                <h2 class="text-center pb-5">Partager vos informations avec {{ $profile->name }}</h2>

                                <form action="{{ route('profiles.contactExchanged', $profile->id) }}" method="POST"
                                    class="max-w-sm mx-auto">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Prénom
                                        </label>
                                        <input
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="text" name="first_name" placeholder="Prénom" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Nom
                                        </label>
                                        <input type="text" name="last_name" placeholder="Nom" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="mb-5">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Email
                                        </label>
                                        <input type="email" name="email" placeholder="Email" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="mb-5">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Phone
                                        </label>
                                        <input type="text" name="phone" placeholder="+212"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <button type="submit"
                                        class="w-full rounded-lg bg-red-400 hover:shadow-lg font-semibold text-white px-6 py-2">Partager</button>
                                </form>


                            </div>

                        </div>
                    </div>


                    <!-- Bouton Share My Profile -->
                    <button id="share-button"
                        class="w-full sm:w-1/3 rounded-lg bg-blue-400 hover:shadow-lg font-semibold text-white px-6 py-2">
                        Share My Profile
                    </button>
                </div>

            </div>

            @if ($isOwner)
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
                        <button onclick="downloadQRCode('png')"
                            class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                            Télécharger PNG
                        </button>
                        <button onclick="downloadQRCode('jpg')"
                            class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                            Télécharger JPG
                        </button>
                        <button onclick="downloadAsPDF()" class="w-full bg-yellow-500 text-black py-2 mx-2 rounded-md">
                            Télécharger PDF
                        </button>
                    </div>
                    <div class="relative w-full mx-auto">
                        <input type="text" value="{{ $profile->profile_link }}" id="profile-link"
                            class="w-full px-4 py-2 text-black rounded-md " readonly />
                        <button onclick="copyToClipboard()"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800 track-link"
                            title="Copier">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>



                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                        
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                    <path
                                        d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9q-.13 0-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                    <path
                                        d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4 4 0 0 1-.82 1H12a3 3 0 1 0 0-6z" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Total Link Taps
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $profile->insights->link_taps ?? 0 }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                <svg fill="#22c55e" width="25px" height="25px" viewBox="-3.5 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>view</title>
                                    <path
                                        d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Card Views
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $profile->insights->views ?? 0 }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Contact Exchanged
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $profile->insights->contact_exchanged ?? 0 }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 20 20">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Contact Download
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $profile->insights->contact_downloads ?? 0 }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div class="p-3 mr-4 text-pink-500 bg-pink-100 rounded-full dark:text-teal-100 dark:bg-pink-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-share-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Share Profile
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $profile->insights->share_links ?? 0 }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="copy-notification"
                        class="fixed bottom-36 right-96 bg-blue-500 text-white text-sm px-4 py-2 rounded shadow-lg hidden">
                        Lien copié !
                    </div>
                </div>
            @endif

        </div>
    </div>




    <!-- jsPDF Library -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        //share profile
        /*document.getElementById('share-button').addEventListener('click', function() {
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
        });*/

        /*
        document.getElementById('share-button').addEventListener('click', function() {
            const profileUrl = "{{ route('profiles.show', $profile->id) }}";
            const profileTitle = "{{ $profile->name }}'s Profile";
            const profileText = "Check out my profile on this amazing platform!";

            if (navigator.share) {
                navigator.share({
                    title: profileTitle,
                    text: profileText,
                    url: profileUrl,
                }).then(() => {
                    console.log('Profile shared successfully!');

                    // Envoyer la requête AJAX pour incrémenter share_links
                    fetch("{{ route('profiles.shareLinks', $profile->id) }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => console.log('Share count updated:', data))
                        .catch(error => console.error('Error updating share count:', error));
                }).catch((error) => console.error('Error sharing profile:', error));
            } else {
                alert('Sharing is not supported on your browser.');
            }
        });
        */

        document.getElementById('share-button').addEventListener('click', function() {
        const profileUrl = "{{ route('profiles.show', $profile->id) }}";
        const profileTitle = "{{ $profile->name }}'s Profile";
        const profileText = "Check out my profile on this amazing platform!";

        if (navigator.share) {
            navigator.share({
                title: profileTitle,
                text: profileText,
                url: profileUrl,
            }).then(() => {
                console.log('Profile shared successfully!');

                // Requête AJAX pour incrémenter share_links
                fetch("{{ route('profiles.shareLinks', $profile->id) }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Share count updated:', data);
                        //alert("Profile shared! Total shares: " + data.share_links);
                    })
                    .catch(error => console.error('Error updating share count:', error));
            }).catch((error) => console.error('Error sharing profile:', error));
        } else {
            alert('Sharing is not supported on your browser.');
        }
    });


        //track link
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".track-link").forEach(link => {
                link.addEventListener("click", function() {
                    fetch("{{ route('profiles.linkTap', $profile->id) }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            link: this.href
                        })
                    });
                });
            });
        });

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
    </script>

@endsection
