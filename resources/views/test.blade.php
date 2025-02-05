@extends('layout')

@section('title', 'Test')

@section('content')

    <section class="h-screen bg-gradient-to-r from-pink-300 to-blue-300">
        <div class="container mx-auto py-5 h-full flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative bg-black h-52 flex items-end p-4 text-white">
                        <div class="absolute -bottom-12 left-4 flex flex-col items-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                alt="Profile image" class="w-36 rounded-full border-4 border-white">
                            <button
                                class="mt-2 px-4 py-2 border border-gray-700 text-gray-700 rounded hover:bg-gray-200">Edit
                                profile</button>
                        </div>
                    </div>
                    <div class="mt-14 px-6 pb-4 text-center">
                        <h5 class="text-lg font-semibold">Andy Horwitz</h5>
                        <p class="text-gray-500">New York</p>
                    </div>
                    <div class="p-4 bg-gray-100 flex justify-center text-gray-700">
                        <div class="text-center mx-4">
                            <p class="text-xl font-bold">253</p>
                            <p class="text-sm text-gray-500">Photos</p>
                        </div>
                        <div class="text-center mx-4">
                            <p class="text-xl font-bold">1026</p>
                            <p class="text-sm text-gray-500">Followers</p>
                        </div>
                        <div class="text-center mx-4">
                            <p class="text-xl font-bold">478</p>
                            <p class="text-sm text-gray-500">Following</p>
                        </div>
                    </div>
                    <div class="p-6 text-gray-800">
                        <p class="text-lg font-semibold">About</p>
                        <div class="mt-2 p-4 bg-gray-100 rounded">
                            <p class="italic">Web Developer</p>
                            <p class="italic">Lives in New York</p>
                            <p class="italic">Photographer</p>
                        </div>
                    </div>
                    <div class="px-6 pb-6">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-semibold">Recent photos</p>
                            <a href="#" class="text-gray-500 text-sm">Show all</a>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                class="w-full rounded-lg">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                                class="w-full rounded-lg">
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                class="w-full rounded-lg">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                class="w-full rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
