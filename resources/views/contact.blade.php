@extends('/layout')
@include('partials.sidebar', ['profile' => $profile])

@section('title', 'Liste des clients')

@section('content')
    <div class="container">
        <h2 class="text-xl font-bold mb-4 mt-7 text-center text-gray-900">Contacts échangés pour {{ $profile->name }}</h2>

        @if ($contacts->isEmpty())
            <p>Aucun contact échangé pour ce profil.</p>
        @else
            <div class="flex flex-col m-4 sm:m-12">
                <div class=" overflow-x-auto pb-4">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden  border rounded-lg border-gray-300">
                            <table class="table-auto min-w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th scope="col"
                                            class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]">
                                            Prénom</th>
                                        <th scope="col"
                                            class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Nom </th>
                                        <th scope="col"
                                            class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Phone </th>
                                        <th scope="col"
                                            class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Email </th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                                    @foreach ($contacts as $contact)
                                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                {{ $contact->first_name }}</td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                {{ $contact->last_name }}
                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                {{ $contact->phone }}
                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                {{ $contact->email }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>
@endsection
