<?php
use App\Destination;
$destinations=Destination::all();
?>
<x-layout-admin>
    <x-slot name='gestion'>
		<style>
            #gestion {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>

    <x-slot name='panel'>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Liste des universités</h3>
                    <span class="text-base font-normal text-gray-500">Vous pouvez ici créer, modifier, visualiser ou supprimer toutes les données des universités partenaires</span>
                </div>
            </div>
            <a href="/admin/creation" class="hover:bg-blue-900 bg-blue-600 text-white px-3 py-2 mt-4 rounded-md text-sm font-medium">
                Ajouter une nouvelle destination
            </a>
            <div class="flex flex-col mt-4 border-2 border-gray-300 rounded-lg">
                <div class="overflow-x-auto rounded-lg">
                    <div class="align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom Université
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Création Page
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date dernière modification
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Outils Edition
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($destinations as $destination)
                                <tr>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        {{$destination->nom}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                        {{$destination->created_at}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{$destination->updated_at}}
                                    </td>
                                    <td class="flex flex-row m-2">
                                        <a href='/admin/modification/{{$destination->nom}}' class="hover:bg-blue-700 hover:text-white px-3 py-2 ml-2 rounded-md text-sm font-medium">Modifier</a>
                                        <form method="post" action="/admin/suppression">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="delete" value="{{$destination->nom}}"/>
                                            <button class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
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
        </div>
	</x-slot>
</x-layout-admin>