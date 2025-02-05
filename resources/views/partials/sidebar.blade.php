<!-- resources/views/partials/sidebar.blade.php -->
<div class="bg-blue-600">
    <span class="absolute text-gray-900 text-4xl top-3 left-4 cursor-pointer lg:hidden" onclick="openSidebar()">
        <i class="bi bi-filter-left px-2 bg-white rounded-md"></i>
    </span>
    <div
        class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 lg:block hidden z-50">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/montagBlack.png') }}" class="h-50 w-44" alt="Logo">
                </a>


                <i class="bi bi-x cursor-pointer ml-16 lg:hidden" onclick="openSidebar()"></i>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        
        <a href="{{ route('home') }}"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
        </a>

        <a href="{{ route('profiles.index') }}"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-credit-card-2-front-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">My Card</span>
        </a>

        <a href="{{ isset($profile) ? route('contact.ContactListe', $profile->id) : route('profiles.create') }}"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-person-vcard-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Contact Manager</span>
        </a>

        <a href="{{ isset($profile) ? route('profiles.insightsChart') : route('profiles.create') }}"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-graph-up-arrow"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Analytics</span>
        </a>

        <a href="{{ route('profiles.link') }}"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-up-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Link</span>

        </a>

        <!--div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
            onclick="dropdown()">
            <i class="bi bi-chat-left-text-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Share</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>
        <div class="my-4 bg-gray-600 h-[1px]"></div>

        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold hidden" id="submenu">
            <a href="{{ route('profiles.link') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Link</h1>
            </a>

            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">QR code</h1>

        </div-->

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); this.removeAttribute('onclick'); document.getElementById('logout-form').submit();"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


    </div>
</div>
