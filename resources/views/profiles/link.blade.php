@extends('/layout')

@section('title', 'Show Link')

@section('content')


    <div>
       
        <div class="bg-gray-900 text-white p-6 rounded-md space-y-6">

            <div class="flex items-start justify-center space-x-4">
                <div class="w-32 h-32 bg-white flex items-center justify-center rounded-md">
                    @if ($profile->qr_code)
                        <img id="qr-code" src="{{ asset('storage/' . $profile->qr_code) }}" alt="Qr code" class="w-28 h-28">
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


    






@endsection
