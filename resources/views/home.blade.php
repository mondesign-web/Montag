@extends('layout')

@section('title', 'Accueil')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex flex-col md:flex-row justify-between my-3">
                <h4
                    class="my-6 text-base md:text-lg font-semibold text-gray-700 dark:text-gray-200 text-center md:text-left">
                    Welcome to Montag, {{ auth()->user()->name }}!
                </h4>

                <div class="text-center md:text-right">
                    @if (!Auth::user()->profile)
                        <a href="{{ route('profiles.create') }}">
                            <button type="button"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 pr-2" fill="#ffffff"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg>
                                Create Profile
                            </button>
                        </a>
                    @else
                        <!-- Vous avez déjà créé un profil. -->
                        <p></p>
                    @endif


                </div>
            </div>

            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-5">
                @foreach ($profiles as $profile)
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
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
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
                        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-person-vcard-fill" viewBox="0 0 20 20">
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
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-link" viewBox="0 0 16 16">
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
                @endforeach
            </div>

            <div>
            </div>
        </div>

        <div class="flex flex-col m-4 sm:m-12">
            <div class=" overflow-x-auto pb-4">
                <div class="min-w-full inline-block align-middle">
                    @if (session('success'))
                        <div class="bg-green-300 text-white p-4 rounded-md my-7">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-hidden  border rounded-lg border-gray-300">
                        <table class="table-auto min-w-full rounded-xl">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]">
                                        Full Name</th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Title </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Bio </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Join Date </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Email </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Phone </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Status </th>
                                    <th scope="col"
                                        class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Actions </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 ">
                                @foreach ($profiles as $profile)
                                    <tr class="bg-white transition-all duration-500 ">
                                        <td class="p-5 whitespace-nowrap leading-6 font-medium text-gray-900">
                                            <div class="w-48 flex items-center gap-3">
                                                @if (!empty($profile->photo_url) && \Storage::disk('public')->exists($profile->photo_url))
                                                    <img src="{{ asset('storage/' . $profile->photo_url ?? 'default-photo.png') }}"
                                                        alt="{{ $profile->name }}" width="30" height="30"
                                                        class="rounded-full">
                                                @else
                                                    <!-- Display avatar with the user's initial -->
                                                    <div
                                                        class="flex items-center justify-center w-10 h-10 relative border-4 border-white rounded-full overflow-hidden">
                                                        <div
                                                            class="w-full h-full rounded-full flex items-center justify-center bg-blue-500 text-white text-lg font-bold uppercase">
                                                            <span>{{ $profile->nameInitial }}</span>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="data">
                                                    <p class="font-normal text-sm text-gray-900">{{ $profile->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            {{ $profile->title }}</td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            {{ $profile->address }}
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            {{ $profile->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            {{ $profile->email }}
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            {{ $profile->phone }}
                                        </td>
                                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                            <div
                                                class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1">
                                                <svg width="5" height="6" viewBox="0 0 5 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2.5" cy="3" r="2.5" fill="#059669">
                                                    </circle>
                                                </svg>
                                                <span class="font-medium text-xs text-emerald-600 ">Active</span>
                                            </div>
                                        </td>
                                        <td class="flex p-5 items-center gap-0.5">
                                            <a href="{{ route('profiles.show', $profile->id) }}">
                                                <button type="submit"
                                                    class="p-2 rounded-full bg-white group transition-all duration-500 hover:bg-emerald-600 flex item-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path class="fill-green-600 group-hover:fill-white"
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                        <path class="fill-green-600 group-hover:fill-white"
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="{{ route('profiles.edit', $profile->id) }}">
                                                <button
                                                    class="p-2  rounded-full bg-white group transition-all duration-500 hover:bg-blue-600 flex item-center">
                                                    <svg class="cursor-pointer" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-blue-600 group-hover:fill-white"
                                                            d="M9.53414 8.15675L8.96459 7.59496L8.96459 7.59496L9.53414 8.15675ZM13.8911 3.73968L13.3215 3.17789V3.17789L13.8911 3.73968ZM16.3154 3.75892L15.7367 4.31126L15.7367 4.31127L16.3154 3.75892ZM16.38 3.82658L16.9587 3.27423L16.9587 3.27423L16.38 3.82658ZM16.3401 6.13595L15.7803 5.56438L16.3401 6.13595ZM11.9186 10.4658L12.4784 11.0374L11.9186 10.4658ZM11.1223 10.9017L10.9404 10.1226V10.1226L11.1223 10.9017ZM9.07259 10.9951L8.52556 11.5788L8.52556 11.5788L9.07259 10.9951ZM9.09713 8.9664L9.87963 9.1328V9.1328L9.09713 8.9664ZM9.05721 10.9803L8.49542 11.5498H8.49542L9.05721 10.9803ZM17.1679 4.99458L16.368 4.98075V4.98075L17.1679 4.99458ZM15.1107 2.8693L15.1171 2.06932L15.1107 2.8693ZM9.22851 8.51246L8.52589 8.12992L8.52452 8.13247L9.22851 8.51246ZM9.22567 8.51772L8.52168 8.13773L8.5203 8.1403L9.22567 8.51772ZM11.5684 10.7654L11.9531 11.4668L11.9536 11.4666L11.5684 10.7654ZM11.5669 10.7662L11.9507 11.4681L11.9516 11.4676L11.5669 10.7662ZM11.3235 3.30005C11.7654 3.30005 12.1235 2.94188 12.1235 2.50005C12.1235 2.05822 11.7654 1.70005 11.3235 1.70005V3.30005ZM18.3 9.55887C18.3 9.11705 17.9418 8.75887 17.5 8.75887C17.0582 8.75887 16.7 9.11705 16.7 9.55887H18.3ZM3.47631 16.5237L4.042 15.9581H4.042L3.47631 16.5237ZM16.5237 16.5237L15.958 15.9581L15.958 15.9581L16.5237 16.5237ZM10.1037 8.71855L14.4606 4.30148L13.3215 3.17789L8.96459 7.59496L10.1037 8.71855ZM15.7367 4.31127L15.8013 4.37893L16.9587 3.27423L16.8941 3.20657L15.7367 4.31127ZM15.7803 5.56438L11.3589 9.89426L12.4784 11.0374L16.8998 6.70753L15.7803 5.56438ZM10.9404 10.1226C10.3417 10.2624 9.97854 10.3452 9.72166 10.3675C9.47476 10.3888 9.53559 10.3326 9.61962 10.4113L8.52556 11.5788C8.9387 11.966 9.45086 11.9969 9.85978 11.9615C10.2587 11.9269 10.7558 11.8088 11.3042 11.6807L10.9404 10.1226ZM8.31462 8.8C8.19986 9.33969 8.09269 9.83345 8.0681 10.2293C8.04264 10.6393 8.08994 11.1499 8.49542 11.5498L9.619 10.4107C9.70348 10.494 9.65043 10.5635 9.66503 10.3285C9.6805 10.0795 9.75378 9.72461 9.87963 9.1328L8.31462 8.8ZM9.61962 10.4113C9.61941 10.4111 9.6192 10.4109 9.619 10.4107L8.49542 11.5498C8.50534 11.5596 8.51539 11.5693 8.52556 11.5788L9.61962 10.4113ZM15.8013 4.37892C16.0813 4.67236 16.2351 4.83583 16.3279 4.96331C16.4073 5.07234 16.3667 5.05597 16.368 4.98075L17.9678 5.00841C17.9749 4.59682 17.805 4.27366 17.6213 4.02139C17.451 3.78756 17.2078 3.53522 16.9587 3.27423L15.8013 4.37892ZM16.8998 6.70753C17.1578 6.45486 17.4095 6.21077 17.5876 5.98281C17.7798 5.73698 17.9607 5.41987 17.9678 5.00841L16.368 4.98075C16.3693 4.90565 16.4103 4.8909 16.327 4.99749C16.2297 5.12196 16.0703 5.28038 15.7803 5.56438L16.8998 6.70753ZM14.4606 4.30148C14.7639 3.99402 14.9352 3.82285 15.0703 3.71873C15.1866 3.62905 15.1757 3.66984 15.1044 3.66927L15.1171 2.06932C14.6874 2.06591 14.3538 2.25081 14.0935 2.45151C13.8518 2.63775 13.5925 2.9032 13.3215 3.17789L14.4606 4.30148ZM16.8941 3.20657C16.6279 2.92765 16.373 2.65804 16.1345 2.46792C15.8774 2.26298 15.5468 2.07273 15.1171 2.06932L15.1044 3.66927C15.033 3.66871 15.0226 3.62768 15.1372 3.71904C15.2704 3.82522 15.4387 3.999 15.7367 4.31126L16.8941 3.20657ZM8.96459 7.59496C8.82923 7.73218 8.64795 7.90575 8.5259 8.12993L9.93113 8.895C9.92075 8.91406 9.91465 8.91711 9.93926 8.88927C9.97002 8.85445 10.0145 8.80893 10.1037 8.71854L8.96459 7.59496ZM9.87963 9.1328C9.9059 9.00925 9.91925 8.94785 9.93124 8.90366C9.94073 8.86868 9.94137 8.87585 9.93104 8.89515L8.5203 8.1403C8.39951 8.36605 8.35444 8.61274 8.31462 8.8L9.87963 9.1328ZM8.52452 8.13247L8.52168 8.13773L9.92967 8.89772L9.9325 8.89246L8.52452 8.13247ZM11.3589 9.89426C11.27 9.98132 11.2252 10.0248 11.1909 10.055C11.1635 10.0791 11.1658 10.0738 11.1832 10.0642L11.9536 11.4666C12.1727 11.3462 12.3427 11.1703 12.4784 11.0374L11.3589 9.89426ZM11.3042 11.6807C11.4912 11.6371 11.7319 11.5878 11.9507 11.4681L11.1831 10.0643C11.2007 10.0547 11.206 10.0557 11.1697 10.0663C11.1248 10.0793 11.0628 10.0941 10.9404 10.1226L11.3042 11.6807ZM11.1837 10.064L11.1822 10.0648L11.9516 11.4676L11.9531 11.4668L11.1837 10.064ZM16.399 6.10097L13.8984 3.60094L12.7672 4.73243L15.2677 7.23246L16.399 6.10097ZM10.8333 16.7001H9.16667V18.3001H10.8333V16.7001ZM3.3 10.8334V9.16672H1.7V10.8334H3.3ZM9.16667 3.30005H11.3235V1.70005H9.16667V3.30005ZM16.7 9.55887V10.8334H18.3V9.55887H16.7ZM9.16667 16.7001C7.5727 16.7001 6.45771 16.6984 5.61569 16.5851C4.79669 16.475 4.35674 16.2728 4.042 15.9581L2.91063 17.0894C3.5722 17.751 4.40607 18.0369 5.4025 18.1709C6.37591 18.3018 7.61793 18.3001 9.16667 18.3001V16.7001ZM1.7 10.8334C1.7 12.3821 1.6983 13.6241 1.82917 14.5976C1.96314 15.594 2.24905 16.4279 2.91063 17.0894L4.042 15.9581C3.72726 15.6433 3.52502 15.2034 3.41491 14.3844C3.3017 13.5423 3.3 12.4273 3.3 10.8334H1.7ZM10.8333 18.3001C12.3821 18.3001 13.6241 18.3018 14.5975 18.1709C15.5939 18.0369 16.4278 17.751 17.0894 17.0894L15.958 15.9581C15.6433 16.2728 15.2033 16.475 14.3843 16.5851C13.5423 16.6984 12.4273 16.7001 10.8333 16.7001V18.3001ZM16.7 10.8334C16.7 12.4274 16.6983 13.5423 16.5851 14.3844C16.475 15.2034 16.2727 15.6433 15.958 15.9581L17.0894 17.0894C17.7509 16.4279 18.0369 15.594 18.1708 14.5976C18.3017 13.6241 18.3 12.3821 18.3 10.8334H16.7ZM3.3 9.16672C3.3 7.57275 3.3017 6.45776 3.41491 5.61574C3.52502 4.79674 3.72726 4.35679 4.042 4.04205L2.91063 2.91068C2.24905 3.57225 1.96314 4.40612 1.82917 5.40255C1.6983 6.37596 1.7 7.61798 1.7 9.16672H3.3ZM9.16667 1.70005C7.61793 1.70005 6.37591 1.69835 5.4025 1.82922C4.40607 1.96319 3.5722 2.24911 2.91063 2.91068L4.042 4.04205C4.35674 3.72731 4.79669 3.52507 5.61569 3.41496C6.45771 3.30175 7.5727 3.30005 9.16667 3.30005V1.70005Z"
                                                            fill="#818CF8"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 rounded-full bg-white group transition-all duration-500 hover:bg-red-600 flex item-center">
                                                    <svg class="" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-red-600 group-hover:fill-white"
                                                            d="M4.00031 5.49999V4.69999H3.20031V5.49999H4.00031ZM16.0003 5.49999H16.8003V4.69999H16.0003V5.49999ZM17.5003 5.49999L17.5003 6.29999C17.9421 6.29999 18.3003 5.94183 18.3003 5.5C18.3003 5.05817 17.9421 4.7 17.5003 4.69999L17.5003 5.49999ZM9.30029 9.24997C9.30029 8.80814 8.94212 8.44997 8.50029 8.44997C8.05847 8.44997 7.70029 8.80814 7.70029 9.24997H9.30029ZM7.70029 13.75C7.70029 14.1918 8.05847 14.55 8.50029 14.55C8.94212 14.55 9.30029 14.1918 9.30029 13.75H7.70029ZM12.3004 9.24997C12.3004 8.80814 11.9422 8.44997 11.5004 8.44997C11.0585 8.44997 10.7004 8.80814 10.7004 9.24997H12.3004ZM10.7004 13.75C10.7004 14.1918 11.0585 14.55 11.5004 14.55C11.9422 14.55 12.3004 14.1918 12.3004 13.75H10.7004ZM4.00031 6.29999H16.0003V4.69999H4.00031V6.29999ZM15.2003 5.49999V12.5H16.8003V5.49999H15.2003ZM11.0003 16.7H9.00031V18.3H11.0003V16.7ZM4.80031 12.5V5.49999H3.20031V12.5H4.80031ZM9.00031 16.7C7.79918 16.7 6.97882 16.6983 6.36373 16.6156C5.77165 16.536 5.49093 16.3948 5.29823 16.2021L4.16686 17.3334C4.70639 17.873 5.38104 18.0979 6.15053 18.2013C6.89702 18.3017 7.84442 18.3 9.00031 18.3V16.7ZM3.20031 12.5C3.20031 13.6559 3.19861 14.6033 3.29897 15.3498C3.40243 16.1193 3.62733 16.7939 4.16686 17.3334L5.29823 16.2021C5.10553 16.0094 4.96431 15.7286 4.88471 15.1366C4.80201 14.5215 4.80031 13.7011 4.80031 12.5H3.20031ZM15.2003 12.5C15.2003 13.7011 15.1986 14.5215 15.1159 15.1366C15.0363 15.7286 14.8951 16.0094 14.7024 16.2021L15.8338 17.3334C16.3733 16.7939 16.5982 16.1193 16.7016 15.3498C16.802 14.6033 16.8003 13.6559 16.8003 12.5H15.2003ZM11.0003 18.3C12.1562 18.3 13.1036 18.3017 13.8501 18.2013C14.6196 18.0979 15.2942 17.873 15.8338 17.3334L14.7024 16.2021C14.5097 16.3948 14.229 16.536 13.6369 16.6156C13.0218 16.6983 12.2014 16.7 11.0003 16.7V18.3ZM2.50031 4.69999C2.22572 4.7 2.04405 4.7 1.94475 4.7C1.89511 4.7 1.86604 4.7 1.85624 4.7C1.85471 4.7 1.85206 4.7 1.851 4.7C1.05253 5.50059 1.85233 6.3 1.85256 6.3C1.85273 6.3 1.85297 6.3 1.85327 6.3C1.85385 6.3 1.85472 6.3 1.85587 6.3C1.86047 6.3 1.86972 6.3 1.88345 6.3C1.99328 6.3 2.39045 6.3 2.9906 6.3C4.19091 6.3 6.2032 6.3 8.35279 6.3C10.5024 6.3 12.7893 6.3 14.5387 6.3C15.4135 6.3 16.1539 6.3 16.6756 6.3C16.9364 6.3 17.1426 6.29999 17.2836 6.29999C17.3541 6.29999 17.4083 6.29999 17.4448 6.29999C17.4631 6.29999 17.477 6.29999 17.4863 6.29999C17.4909 6.29999 17.4944 6.29999 17.4968 6.29999C17.498 6.29999 17.4988 6.29999 17.4994 6.29999C17.4997 6.29999 17.4999 6.29999 17.5001 6.29999C17.5002 6.29999 17.5003 6.29999 17.5003 5.49999C17.5003 4.69999 17.5002 4.69999 17.5001 4.69999C17.4999 4.69999 17.4997 4.69999 17.4994 4.69999C17.4988 4.69999 17.498 4.69999 17.4968 4.69999C17.4944 4.69999 17.4909 4.69999 17.4863 4.69999C17.477 4.69999 17.4631 4.69999 17.4448 4.69999C17.4083 4.69999 17.3541 4.69999 17.2836 4.69999C17.1426 4.7 16.9364 4.7 16.6756 4.7C16.1539 4.7 15.4135 4.7 14.5387 4.7C12.7893 4.7 10.5024 4.7 8.35279 4.7C6.2032 4.7 4.19091 4.7 2.9906 4.7C2.39044 4.7 1.99329 4.7 1.88347 4.7C1.86974 4.7 1.86051 4.7 1.85594 4.7C1.8548 4.7 1.85396 4.7 1.85342 4.7C1.85315 4.7 1.85298 4.7 1.85288 4.7C1.85284 4.7 2.65253 5.49941 1.85408 6.3C1.85314 6.3 1.85296 6.3 1.85632 6.3C1.86608 6.3 1.89511 6.3 1.94477 6.3C2.04406 6.3 2.22573 6.3 2.50031 6.29999L2.50031 4.69999ZM7.05028 5.49994V4.16661H5.45028V5.49994H7.05028ZM7.91695 3.29994H12.0836V1.69994H7.91695V3.29994ZM12.9503 4.16661V5.49994H14.5503V4.16661H12.9503ZM12.0836 3.29994C12.5623 3.29994 12.9503 3.68796 12.9503 4.16661H14.5503C14.5503 2.8043 13.4459 1.69994 12.0836 1.69994V3.29994ZM7.05028 4.16661C7.05028 3.68796 7.4383 3.29994 7.91695 3.29994V1.69994C6.55465 1.69994 5.45028 2.8043 5.45028 4.16661H7.05028ZM2.50031 6.29999C4.70481 6.29998 6.40335 6.29998 8.1253 6.29997C9.84725 6.29996 11.5458 6.29995 13.7503 6.29994L13.7503 4.69994C11.5458 4.69995 9.84724 4.69996 8.12529 4.69997C6.40335 4.69998 4.7048 4.69998 2.50031 4.69999L2.50031 6.29999ZM13.7503 6.29994L17.5003 6.29999L17.5003 4.69999L13.7503 4.69994L13.7503 6.29994ZM7.70029 9.24997V13.75H9.30029V9.24997H7.70029ZM10.7004 9.24997V13.75H12.3004V9.24997H10.7004Z"
                                                            fill="#F87171"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--div class="flex justify-center items-center">
                                            <div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 mx-4">
                                                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                                            <path
                                                                d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                                            <path
                                                                d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                                            </svg>
                                                        </div>
                                                    <div>
                                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3.4k</h5>
                                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Leads generated per week</p>
                                                </div>
                                            </div>
                                            <div>
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                                    </svg>
                                                        42.5%
                                                </span>
                                            </div>
                                            </div>

                                            <div class="grid grid-cols-2">
                                                                <dl class="flex items-center">
                                                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Money spent:</dt>
                                                                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">$3,232</dd>
                                                                </dl>
                                                                <dl class="flex items-center justify-end">
                                                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Conversion rate:</dt>
                                                                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">1.2%</dd>
                                                                </dl>
                                                            </div>

                                                            <div id="column-chart"></div>
                                                            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                                                                <div class="flex justify-between items-center pt-5">
                                                                    
                                                                    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                                                        data-dropdown-placement="bottom"
                                                                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                                        type="button">
                                                                        Last 7 days
                                                                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 10 6">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                                                        </svg>
                                                                    </button>
                                                                    
                                                                    <div id="lastDaysdropdown"
                                                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                                            aria-labelledby="dropdownDefaultButton">
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    7 days</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    30 days</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    90 days</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <a href="#"
                                                                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                                                        Leads Report
                                                                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 mx-4">

                                                            <div class="flex justify-between items-start w-full">
                                                                <div class="flex-col items-center">
                                                                    <div class="flex items-center mb-1">
                                                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Website traffic
                                                                        </h5>
                                                                        <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                                                            class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                            viewBox="0 0 20 20">
                                                                            <path
                                                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                                                        </svg>
                                                                        <div data-popover id="chart-info" role="tooltip"
                                                                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                                                            <div class="p-3 space-y-2">
                                                                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental
                                                                                </h3>
                                                                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart
                                                                                    should have a growing trend, as stagnating chart signifies a significant decrease of
                                                                                    community activity.</p>
                                                                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                                                                <p>For each date bucket, the all-time volume of activities is calculated. This means
                                                                                    that activities in period n contain all activities up to period n, plus the
                                                                                    activities generated by your community in period.</p>
                                                                                <a href="#"
                                                                                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                                                    more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                                                                    </svg></a>
                                                                            </div>
                                                                            <div data-popper-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <button id="dateRangeButton" data-dropdown-toggle="dateRangeDropdown"
                                                                        data-dropdown-ignore-click-outside-class="datepicker" type="button"
                                                                        class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">31
                                                                        Nov - 31 Dev <svg class="w-3 h-3 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 10 6">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                                                        </svg>
                                                                    </button>
                                                                    <div id="dateRangeDropdown"
                                                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                                                        <div class="p-3" aria-labelledby="dateRangeButton">
                                                                            <div date-rangepicker datepicker-autohide class="flex items-center">
                                                                                <div class="relative">
                                                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                                            viewBox="0 0 20 20">
                                                                                            <path
                                                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                                        </svg>
                                                                                    </div>
                                                                                    <input name="start" type="text"
                                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                        placeholder="Start date">
                                                                                </div>
                                                                                <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                                                                                <div class="relative">
                                                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                                            viewBox="0 0 20 20">
                                                                                            <path
                                                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                                        </svg>
                                                                                    </div>
                                                                                    <input name="end" type="text"
                                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                        placeholder="End date">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-end items-center">
                                                                    <button id="widgetDropdownButton" data-dropdown-toggle="widgetDropdown"
                                                                        data-dropdown-placement="bottom" type="button"
                                                                        class="inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg
                                                                            class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                                            <path
                                                                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                                        </svg><span class="sr-only">Open dropdown</span>
                                                                    </button>
                                                                    <div id="widgetDropdown"
                                                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                                            aria-labelledby="widgetDropdownButton">
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                                                        class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 21 21">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                                                                    </svg>Edit widget
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                                                        class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                                        <path
                                                                                            d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                                                        <path
                                                                                            d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                                                    </svg>Download data
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                                                        class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 18 18">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="m5.953 7.467 6.094-2.612m.096 8.114L5.857 9.676m.305-1.192a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0ZM17 3.84a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Zm0 10.322a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Z" />
                                                                                    </svg>Add to repository
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                                                        class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="currentColor" viewBox="0 0 18 20">
                                                                                        <path
                                                                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                                                    </svg>Delete widget
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="py-6" id="pie-chart"></div>

                                                            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                                                                <div class="flex justify-between items-center pt-5">
                                                                    
                                                                    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                                                        data-dropdown-placement="bottom"
                                                                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                                        type="button">
                                                                        Last 7 days
                                                                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 10 6">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                                                        </svg>
                                                                    </button>
                                                                    <div id="lastDaysdropdown"
                                                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                                            aria-labelledby="dropdownDefaultButton">
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    7 days</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    30 days</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                                                                    90 days</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <a href="#"
                                                                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                                                        Traffic analysis
                                                                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                    </div-->

        <div class="container mx-auto p-6">
            <h2 class="text-xl sm:text-2xl font-semibold mb-6 text-center">Analytics</h2>

            <!-- Conteneur des Graphiques -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Graphique Circulaire -->
                <div class="p-6 bg-white rounded-lg shadow-md flex justify-center">
                    <canvas id="insightsPieChart"></canvas>
                </div>

                <!-- Graphique en Barres -->
                <div class="p-6 bg-white rounded-lg shadow-md flex justify-center">
                    <canvas id="insightsBarChart"></canvas>
                </div>
            </div>
        </div>

        <div>
    
            </div>




    </main>
    <!--script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Données pour les graphiques
            
            //console.log(@json(array_values($data)));
            const dataValues = @json(array_values($data)).slice(1); // Exclure 'views'
            
            const labels = ["Contact Downloads", "Contact Exchanged", "Link Taps", "Share Links"];
            const backgroundColors = ["rgba(255, 99, 132, 0.5)", "rgba(153, 102, 255, 0.5)",
                "rgba(54, 162, 235, 0.5)", "rgba(75, 192, 192, 0.5)"
            ];
            const totalViews = @json($data['views']);

            // Graphique Circulaire
            const pieCtx = document.getElementById('insightsPieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
                                    let percentage = ((value / totalViews) * 100).toFixed(1) + "%";
                                    return tooltipItem.label + ": " + percentage;
                                }
                            }
                        }
                    }
                }
            });

            // Graphique en Barres
            const barCtx = document.getElementById('insightsBarChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Statistiques des interactions',
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderColor: ["#FF6384", "#9966FF", "#36A2EB", "#4BC0C0"],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {}
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });
        });
    </script>

    <!--script>
                                            const options = {
                                                colors: ["#1A56DB", "#FDBA8C"],
                                                series: [{
                                                        name: "Organic",
                                                        color: "#1A56DB",
                                                        data: [{
                                                                x: "Mon",
                                                                y: 231
                                                            },
                                                            {
                                                                x: "Tue",
                                                                y: 122
                                                            },
                                                            {
                                                                x: "Wed",
                                                                y: 63
                                                            },
                                                            {
                                                                x: "Thu",
                                                                y: 421
                                                            },
                                                            {
                                                                x: "Fri",
                                                                y: 122
                                                            },
                                                            {
                                                                x: "Sat",
                                                                y: 323
                                                            },
                                                            {
                                                                x: "Sun",
                                                                y: 111
                                                            },
                                                        ],
                                                    },
                                                    {
                                                        name: "Social media",
                                                        color: "#FDBA8C",
                                                        data: [{
                                                                x: "Mon",
                                                                y: 232
                                                            },
                                                            {
                                                                x: "Tue",
                                                                y: 113
                                                            },
                                                            {
                                                                x: "Wed",
                                                                y: 341
                                                            },
                                                            {
                                                                x: "Thu",
                                                                y: 224
                                                            },
                                                            {
                                                                x: "Fri",
                                                                y: 522
                                                            },
                                                            {
                                                                x: "Sat",
                                                                y: 411
                                                            },
                                                            {
                                                                x: "Sun",
                                                                y: 243
                                                            },
                                                        ],
                                                    },
                                                ],
                                                chart: {
                                                    type: "bar",
                                                    height: "320px",
                                                    fontFamily: "Inter, sans-serif",
                                                    toolbar: {
                                                        show: false,
                                                    },
                                                },
                                                plotOptions: {
                                                    bar: {
                                                        horizontal: false,
                                                        columnWidth: "70%",
                                                        borderRadiusApplication: "end",
                                                        borderRadius: 8,
                                                    },
                                                },
                                                tooltip: {
                                                    shared: true,
                                                    intersect: false,
                                                    style: {
                                                        fontFamily: "Inter, sans-serif",
                                                    },
                                                },
                                                states: {
                                                    hover: {
                                                        filter: {
                                                            type: "darken",
                                                            value: 1,
                                                        },
                                                    },
                                                },
                                                stroke: {
                                                    show: true,
                                                    width: 0,
                                                    colors: ["transparent"],
                                                },
                                                grid: {
                                                    show: false,
                                                    strokeDashArray: 4,
                                                    padding: {
                                                        left: 2,
                                                        right: 2,
                                                        top: -14
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false,
                                                },
                                                legend: {
                                                    show: false,
                                                },
                                                xaxis: {
                                                    floating: false,
                                                    labels: {
                                                        show: true,
                                                        style: {
                                                            fontFamily: "Inter, sans-serif",
                                                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                                        }
                                                    },
                                                    axisBorder: {
                                                        show: false,
                                                    },
                                                    axisTicks: {
                                                        show: false,
                                                    },
                                                },
                                                yaxis: {
                                                    show: false,
                                                },
                                                fill: {
                                                    opacity: 1,
                                                },
                                            }

                                            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                                                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                                                chart.render();
                                            }


                                            const getChartOptions = () => {
                                                return {
                                                    series: [52.8, 26.8, 20.4],
                                                    colors: ["#1C64F2", "#16BDCA", "#9061F9"],
                                                    chart: {
                                                        height: 420,
                                                        width: "100%",
                                                        type: "pie",
                                                    },
                                                    stroke: {
                                                        colors: ["white"],
                                                        lineCap: "",
                                                    },
                                                    plotOptions: {
                                                        pie: {
                                                            labels: {
                                                                show: true,
                                                            },
                                                            size: "100%",
                                                            dataLabels: {
                                                                offset: -25
                                                            }
                                                        },
                                                    },
                                                    labels: ["Direct", "Organic search", "Referrals"],
                                                    dataLabels: {
                                                        enabled: true,
                                                        style: {
                                                            fontFamily: "Inter, sans-serif",
                                                        },
                                                    },
                                                    legend: {
                                                        position: "bottom",
                                                        fontFamily: "Inter, sans-serif",
                                                    },
                                                    yaxis: {
                                                        labels: {
                                                            formatter: function(value) {
                                                                return value + "%"
                                                            },
                                                        },
                                                    },
                                                    xaxis: {
                                                        labels: {
                                                            formatter: function(value) {
                                                                return value + "%"
                                                            },
                                                        },
                                                        axisTicks: {
                                                            show: false,
                                                        },
                                                        axisBorder: {
                                                            show: false,
                                                        },
                                                    },
                                                }
                                            }

                                            if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                                                const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                                                chart.render();
                                            }
                            </script-->


@endsection
