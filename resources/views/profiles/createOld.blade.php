@extends('/layout')

@section('title', 'Create Profile')

@section('content')

    <div class="container mx-auto">

        <div class="border-b border-gray-200 px-4 pt-6">
            <nav class="flex justify-between " id="tabs">
                <button
                    class="flex tab-btn px-1 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent active-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <p class="pl-2"> Step 1 : Personal Info </p>
                </button>
                <button
                    class="flex tab-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-bezier" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        <path
                            d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.52 6.52 0 0 0 1.814 9H2.5q.186 0 .358.043a5.52 5.52 0 0 1 3.185-3.185A1.5 1.5 0 0 1 6 5.5zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.52 6.52 0 0 1 2.72 3.5H13.5q-.185 0-.358.043a5.52 5.52 0 0 0-3.185-3.185" />
                    </svg>
                    <p class="pl-2"> Step 2 : Customize </p>
                </button>
                <button
                    class="tab-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent">
                    Step 3 : Set-up
                </button>
            </nav>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4 py-8">
            <!-- form -->

            <div class="col-span-4 sm:col-span-8 tab-content block">
                <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="username">Full
                            Name</label>
                        <input name="name" id="name" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            oninput="updatePreview('fullName', this.value)" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                            class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            oninput="updatePreview('poste', this.value)">
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="7"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            oninput="updatePreview('description', this.value)"></textarea>

                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Profile Photo
                        </label>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
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
                                        <span id="file-name" class="ml-3 text-gray-600">Aucun fichier choisi</span>
                                        <!-- Input caché -->
                                        <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
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

                    <div class="mb-4">
                        <label for="nfc_tag_id" class="block text-sm font-medium text-gray-700">NFC Tag ID</label>
                        <input type="text" name="nfc_tag_id" id="nfc_tag_id"
                            class="mt-2 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="backgroundColorInput" class="block text-sm font-medium text-gray-700">
                            Choisissez une couleur pour le fond du profil :
                        </label>
                        <input id="backgroundColorInput" type="color"
                            class="mt-1 block w-16 h-10 cursor-pointer border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            value="#111827" />
                    </div>

                    <div class="mb-4">
                        <!--label class="block text-sm font-medium text-gray-700">Social Media Links</label-->
                        <div class="flex gap-4 mt-2">
                            <!-- Icônes réseaux sociaux -->
                            <div class="flex gap-3">
                                <button type="button" onclick="showSocialInput('facebook')">
                                    <img src="https://img.icons8.com/fluency/48/facebook-new.png" alt="Facebook"
                                        class="w-10 h-10">
                                </button>
                                <button type="button" onclick="showSocialInput('whatsapp')">
                                    <img src="https://img.icons8.com/color/48/whatsapp--v1.png" alt="whatsapp"
                                        class="w-12 h-12">
                                </button>
                                <button type="button" onclick="showSocialInput('instagram')">
                                    <img src="https://img.icons8.com/fluency/48/instagram-new.png" alt="Instagram"
                                        class="w-10 h-10">
                                </button>
                                <button type="button" onclick="showSocialInput('linkedin')">
                                    <img src="https://img.icons8.com/fluency/48/linkedin.png" alt="LinkedIn"
                                        class="w-10 h-10">
                                </button>
                            </div>
                        </div>

                        <!-- Champs dynamiques -->
                        <div id="socialInputs" class="mt-4 space-y-2"></div>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
                </form>
            </div>
            <div class="col-span-4 sm:col-span-8 tab-content hidden">
                <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="backgroundColorInput" class="block text-sm font-medium text-gray-700">
                            Choisissez une couleur pour le fond du profil :
                        </label>
                        <input id="backgroundColorInput" type="color"
                            class="mt-1 block w-16 h-10 cursor-pointer border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            value="#111827" />
                    </div>

                    <h2 class="text-[18px] font-semibold text-blue-800 mb-5 ">Social Links :</h2>
                    

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Nest</button>
                </form>
            </div>
            <!-- Apercu -->
            <div class="col-span-4 sm:col-span-4">
                <div
                    class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
                    <!--div class="rounded-t-lg h-32 overflow-hidden">
                                                            <img class="object-cover object-top w-full"
                                                                src='https://images.unsplash.com/photo-1606942040878-9a852c5045a3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                                                                alt='Mountain'>
                                                        </div-->
                    <div id="profileTemplate"
                        class="w-full h-40 rounded-lg text-center text-white flex items-center justify-center shadow-lg"
                        style="background-color: #111827;">

                    </div>
                    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center h-32" id="profilePhotoTemplate"
                            src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                            alt='Woman looking front'>
                    </div>
                    <div class="text-center mt-2">
                        <h2 class="font-semibold" id="fullName">Sarah Smith</h2>
                        <p class="text-gray-500" id="poste">Freelance Web Designer</p>
                        <p class="text-gray-500" id="description"> About me</p>
                    </div>
                    <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
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
                    </ul>
                    <div class="p-4 border-t mx-8 mt-2">
                        <button
                            class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Contact</button>
                    </div>
                </div>
            </div>
        </div>





    </div>



    <script>
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        // Fonction pour activer un onglet
        function activateTab(index) {
            tabButtons.forEach((btn, i) => {
                if (i === index) {
                    btn.classList.add('text-blue-600', 'border-blue-600');
                    btn.classList.remove('text-gray-600');
                    tabContents[i].classList.remove('hidden');
                } else {
                    btn.classList.remove('text-blue-600', 'border-blue-600');
                    btn.classList.add('text-gray-600');
                    tabContents[i].classList.add('hidden');
                }
            });
        }

        // Ajouter les événements aux boutons
        tabButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => activateTab(index));
        });

        // Activer le premier onglet par défaut
        activateTab(0);

        // Mise à jour des champs de texte en temps réel
        function updatePreview(previewId, value) {
            document.getElementById(previewId).textContent = value || ' ';
        }

        // Prévisualisation de la photo de profil
        function previewPhoto(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePhotoTemplate');
                output.src = reader.result;
                document.getElementById('profilePhotoPreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function showSocialInput(platform) {
            const socialInputs = document.getElementById('socialInputs');

            // Vérifiez si un champ pour cette plateforme existe déjà
            if (document.getElementById(`input-${platform}`)) return;

            const inputWrapper = document.createElement('div');
            inputWrapper.id = `input-${platform}`;
            inputWrapper.className = 'flex items-center gap-2';

            inputWrapper.innerHTML = `
        <img src="https://img.icons8.com/${getIconPath(platform)}" alt="${platform}" class="w-8 h-8">
        <input type="url" name="${platform}" placeholder="Enter ${platform} URL"
            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"
            oninput="updateSocialLink('${platform}', this.value)">
        <button onclick="removeSocialInput('${platform}')" class="text-red-500">Remove</button>
    `;

            socialInputs.appendChild(inputWrapper);
        }


        function updateSocialLink(platform, value) {
            const iconLink = document.querySelector(`#preview-${platform}`);
            if (iconLink) {
                iconLink.href = value || "#"; // Mettre à jour le lien ou définir un lien vide par défaut
            }
        }

        function removeSocialInput(platform) {
            const inputWrapper = document.getElementById(`input-${platform}`);
            if (inputWrapper) {
                inputWrapper.remove();
                // Réinitialiser le lien d'aperçu
                const iconLink = document.querySelector(`#preview-${platform}`);
                if (iconLink) {
                    iconLink.href = "#";
                }
            }

        }

        function getIconPath(platform) {
            const paths = {
                facebook: 'fluency/48/facebook-new.png',
                whatsapp: 'color/48/whatsapp--v1.png',
                instagram: 'fluency/48/instagram-new.png',
                linkedin: 'fluency/48/linkedin.png'
            };
            return paths[platform];
        }


        document.addEventListener('DOMContentLoaded', () => {
            // Fonction pour changer la couleur de fond du profil
            function updateBackgroundColor(event) {
                const color = event.target.value; // Récupérer la valeur de la couleur saisie
                const profileContainer = document.getElementById('profileTemplate');
                if (profileContainer) {
                    profileContainer.style.backgroundColor = color; // Appliquer la couleur en arrière-plan
                }
            }

            // Ajout d'un écouteur d'événement à l'input de couleur
            const colorInput = document.getElementById('backgroundColorInput');
            if (colorInput) {
                colorInput.addEventListener('input', updateBackgroundColor); // Réagir en temps réel aux changements
            }
        });
    </script>




@endsection
