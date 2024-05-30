<x-layout-admin>
    <x-slot name='fichiers'>
        <style>
            #fichiers {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            ;
        </style>
    </x-slot>
    <x-slot name='panel'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function afficher_pdf(pdf) {
                $('#'+pdf+', #overlay-back').fadeIn(500);
                $('#'+pdf+"btn"+', #'+pdf).fadeIn(500);
            }
            function cacher_pdf(pdf) {
                $('#'+pdf+', #overlay-back').fadeOut(500);
                $('#'+pdf+"btn"+', #'+pdf).fadeOut(500);
            }

            function afficher_detail(pdf) {
                img = document.getElementById(pdf);
                if (img.style.display == "none") {
                    img.style.display = "block";
                    document.getElementById("bouton_" + pdf).innerHTML = "^";
                } else {
                    img.style.display = "none";
                    document.getElementById("bouton_" + pdf).innerHTML = "v";
                }
            }

            function search() {
                //doit masquer les fichiers qui ne correspondent pas à la recherche
                var search = document.getElementById("search").value;
                var fichiers = document.getElementsByClassName("fichier");
                for (var i = 0; i < fichiers.length; i++) {
                    if (fichiers[i].innerHTML.toLowerCase().indexOf(search.toLowerCase()) == -1) {
                        fichiers[i].parentNode.style.display = "none";
                    } else {
                        fichiers[i].parentNode.style.display = "block";
                    }
                }
            }
        </script>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fichiers des étudiants</h3>
                    <span class="text-base font-normal text-gray-500">Vous pouvez ici visualiser et télécharger les fichiers chargés par les étudiants dans leur espace</span>
                </div>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 mt-4 sm:p-6 xl:p-8 ">
            <input class="mt-4 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" placeholder="Rechercher" id="search" onkeyup="search()">
            @foreach($fichiers as $byuid)
            <div class="mt-4 border-b-2 border-gray-200">
                <div class="fichier">
                    {{$byuid[0]->nomprenom}} ({{$byuid[0]->uid}})
                    <button type="button" id="bouton_{{$byuid[0]->uid}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_detail("{{$byuid[0]->uid}}")'>v</button>
                </div>
                <div id="{{$byuid[0]->uid}}" style="display:none">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom du Fichier
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date Création Fichier
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($byuid as $fichier)
                            <tr>
                                <td class="text-gray-600 text-sm font-semibold mb-2 p-2">{{$fichier->nom}}.{{pathinfo($fichier->url, PATHINFO_EXTENSION)}}</td>
                                <td class="text-gray-600 text-sm font-semibold mb-2 p-2">{{$fichier->created_at}}</td>
                                <td class="flex flex-col">
                                    <div class="flex flex-row">
                                    @if(pathinfo($fichier->url, PATHINFO_EXTENSION) == "pdf")
                                    <button type="button" class="mb-4 items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_pdf("{{$fichier->nom."_".$fichier->uid}}")'>Voir</button>
                                    @endif
                                    <a href="/storage/{{$fichier->url}}" class="mb-4 items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Télécharger</a>
                                    <form class="mb-4" action="" class="inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$fichier->id}}">
                                        <input type="hidden" name="redirect" value="/admin/fichiers">
                                        <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @if(pathinfo($fichier->url, PATHINFO_EXTENSION) == "pdf")
                            <button type="button" onclick='cacher_pdf("{{$fichier->nom."_".$fichier->uid}}")' style="position:fixed;top:3%;left:93%;width:3%;height:3%;z-index:10;display:none;" id="{{$fichier->nom."_".$fichier->uid}}btn"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" xml:space="preserve">
                            <g>
                            <path style="fill:#030104;" d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                C19.033,16.725,19.033,17.138,18.78,17.394z"/>
                            </g></svg></button>
                            <iframe class="w-1/4 h-1/4" src="/storage/{{$fichier->url}}" type="application/pdf" frameBorder="0" scrolling="auto" height="600px" width="1000px" id="{{$fichier->nom."_".$fichier->uid}}" 
                                    style="position : fixed;
                                        top      : 0;
                                        left     : 15%;
                                        width    : 70%;
                                        height   : 100%;
                                        z-index  : 10;
                                        display  : none;" ></iframe>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
        <div id="overlay-back" style="position   : fixed;
                top        : 0;
                left       : 0;
                width      : 100%;
                height     : 100%;
                background : #000;
                opacity    : 0.6;
                filter     : alpha(opacity=60);
                z-index    : 5;
                display    : none;"></div>
    </x-slot>
</x-layout-admin>