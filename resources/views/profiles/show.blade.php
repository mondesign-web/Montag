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
                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32 w-32 "
                        src="{{ asset('storage/' . $profile->photo_url ?? 'default-photo.png') }}" alt="{{ $profile->name }}">
                </div>
                <div class="text-center mt-2">
                    <h2 class="font-semibold">{{ $profile->name }}</h2>
                    <p class="text-gray-500">{{ $profile->title ?? 'Job Title Not Available' }}</p>
                    <p class="text-gray-500">{{ $profile->bio ?? 'Description Not Available' }}</p>
                </div>
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
    <!--script>
        function downloadQRCode(format) {
            const img = document.getElementById('qr-code');
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            // Charge l'image
            const image = new Image();
            image.crossOrigin = "anonymous"; // Si le SVG est sur un autre domaine
            image.onload = () => {
                // Définir les dimensions du canvas
                canvas.width = image.naturalWidth;
                canvas.height = image.naturalHeight;

                // Dessiner l'image sur le canvas
                ctx.drawImage(image, 0, 0);

                // Exporter le canvas au format demandé
                const mimeType = format === 'jpg' ? 'image/jpeg' : 'image/png';
                const dataURL = canvas.toDataURL(mimeType);

                // Créer un lien de téléchargement
                const link = document.createElement('a');
                link.href = dataURL;
                link.download = `qr-code.${format}`;
                link.click();
            };
            image.src = img.src;
        }

        function downloadAsPDF() {
            const img = document.getElementById('qr-code');
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const image = new Image();
            image.crossOrigin = "anonymous"; // Si le SVG est sur un autre domaine
            image.onload = () => {
                canvas.width = image.naturalWidth;
                canvas.height = image.naturalHeight;
                ctx.drawImage(image, 0, 0);

                // Charger jsPDF correctement
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'px',
                    format: [canvas.width, canvas.height]
                });

                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save('qr-code.pdf');
            };
            image.src = img.src;
        }
    </script-->

@endsection
