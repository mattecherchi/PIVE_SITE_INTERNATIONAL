<x-layout-profil>
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
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Polytech Nancy International</title>
            <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        </head>
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
            window.onload = function() {
                var url = window.location.href;
                var get = url.split("?");
                if (get[1] != undefined) {
                    var get = get[1].split("=");
                    if (get[0] == "error") {
                        alert("Le fichier n'a pas pu être ajouté");
                    }
                }
            }
        </script>

        <body>
            <section class="text-gray-600 body-font">
                <div class="bg-white shadow-md rounded-lg px-4 pt-6 pb-8 flex flex-col">
                    <div class="">
                        <h1 class="text-red-900 text-lg title-font font-medium mb-2">Déposez ici uniquement des fichiers à destination du service international, il ne s'agit pas d'un dépot de fichiers personnels.</h1>
                        <h1 class="text-gray-700 text-sm font-bold mb-2">Fichiers en ligne :</h1>
                        <div class="border-2 border-gray-300 rounded mt-2">
                            <div class="align-middle inline-block min-w-full">
                                <div class="shadow overflow-hidden sm:rounded">
                                    <table class="divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="p-2 md:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nom du Fichier
                                                </th>
                                                <th scope="col" class="p-2 md:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date Création Fichier
                                                </th>
                                                <th scope="col" class="p-2 md:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @foreach($fichiers as $fichier)
                                            <tr>
                                                <td class="break-all text-gray-600 text-sm font-semibold mb-2 md:p-2 p-1">{{$fichier->nom}}.{{pathinfo($fichier->url, PATHINFO_EXTENSION)}}</td>
                                                <td class="text-gray-600 text-sm font-semibold mb-2 md:p-2 p-1">{{$fichier->created_at}}</td>
                                                <td class="flex flex-col">
                                                    <div class="flex flex-row items-center justify-center">
                                                        @if(pathinfo($fichier->url, PATHINFO_EXTENSION) == "pdf")
                                                        <button type="button" class="hidden md:block items-center m-2 hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_pdf("{{$fichier->nom}}")'>Voir</button>
                                                        @endif
                                                        <a href="/storage/{{$fichier->url}}" class="hidden md:block m-2 items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Télécharger</a>
                                                        <a href="/storage/{{$fichier->url}}" class="md:hidden items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 p-1 rounded-md text-sm font-medium">
                                                            <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                                            </svg>
                                                        </a>
                                                        <form action="" class="inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{$fichier->id}}">
                                                            <input type="hidden" name="redirect" value="/profil/fichiers">
                                                            <button type="submit" class="hidden md:block items-center m-2 hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                                                            <button type="submit" class="md:hidden items-center hover:bg-red-700 hover:text-white bg-white text-red-700 p-1 rounded-md text-sm font-medium">
                                                                <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if(pathinfo($fichier->url, PATHINFO_EXTENSION) == "pdf")
                                            <button type="button" onclick='cacher_pdf("{{$fichier->nom}}")' style="position:fixed;top:3%;left:93%;width:3%;height:3%;z-index:10;display:none;" id="{{$fichier->nom}}btn"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 26 26" xml:space="preserve">
                                            <g>
                                               <path style="fill:#030104;" d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
                                            </g>
                                                </svg></button>
                                                    <iframe class="w-1/4 h-1/4" src="/storage/{{$fichier->url}}" type="application/pdf" frameBorder="0" scrolling="auto" height="600px" width="1000px" id="{{$fichier->nom}}" 
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
                        </div>
                    </div>
                    <form enctype="multipart/form-data" class="mt-5" action="" method="POST">
                        @csrf
                        <h2 class="text-gray-700 text-sm font-bold mb-2">Ajouter un fichier :</h2>
                        <label class="block text-gray-600 text-sm font-semibold mb-2" for="nom"> Nom du fichier (pas besoin de mettre votre nom) :</label>
                        <input type="text" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <input class="my-2 w-full" id="upload" type="file" name="fichier" accept=".pdf,.doc,.docx,.odt" max-file-size="500" />
                        <button class="bg-blue-500 hover:bg-blue-700 text-white mt-4 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Upload</button>
                        @if(isset($_GET["e"]))
                            @if($_GET["e"]==1)
                            <p class="text-red-500 italic">Vous devez remplir tous les champs</p>
                            @endif
                        @endif
                    </form>
                </div>
            </section>
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
        </body>
        <script>
             document.getElementById("upload").onchange = function() {
                if(this.files[0].size > 2000000){
                    alert("Le fichier est trop volumineux !");
                    this.value = "";
                };
            };
        </script>
    </x-slot>
</x-layout-profil>