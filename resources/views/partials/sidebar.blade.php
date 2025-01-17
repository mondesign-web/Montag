<!-- resources/views/partials/sidebar.blade.php -->
<div class="bg-blue-600" >
    <span class="absolute text-gray-900 text-4xl top-3 left-4 cursor-pointer lg:hidden" onclick="openSidebar()">
        <i class="bi bi-filter-left px-2 bg-white rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 lg:block hidden z-50">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <img src="{{ asset('img/montagBlack.png') }}" class="h-50 w-44" alt="Logo">
                
                <i class="bi bi-x cursor-pointer ml-16 lg:hidden" onclick="openSidebar()"></i>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <a href="/" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
        </a>
        <a href="/card" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-credit-card-2-front-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">My Cards</span>
        </a>
        <div class="my-4 bg-gray-600 h-[1px]"></div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">
            <i class="bi bi-chat-left-text-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Share</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold hidden" id="submenu">
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Social</h1>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Personal</h1>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Friends</h1>
        </div>
      
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
