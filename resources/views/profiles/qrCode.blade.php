@extends('/layout')

@section('title', 'Generate Qr Code')

@section('content')

<div class="container mx-auto text-center">
    <h1 class="text-2xl font-bold mb-4">QR Code pour le profil</h1>
    <p>Scannez ce QR Code pour accéder au profil :</p>
    <div class="mt-4">
        {!! $qrCode !!} <!-- Affichage du QR Code -->
    </div>
    <p class="mt-4">URL : <a href="{{ $profileUrl }}" class="text-blue-600">{{ $profileUrl }}</a></p>
</div>

@endsection