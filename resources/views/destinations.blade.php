<?php

use App\Destination;

$destinations = Destination::all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body class="bg-gray-200">
    <script>
        function removeAccents(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }
        function chercher() {
            var recherche = removeAccents(document.getElementById("recherche").value.toLowerCase());
            var fiches = document.getElementsByClassName("nom");
            for (var i = 0; i < fiches.length; i++) {
                var fiche = fiches[i];
                var nom = removeAccents(fiche.innerHTML.toLowerCase());
                if (nom.indexOf(recherche) == -1) {
                    parent = fiche.parentNode.parentNode.parentNode.style.display = "none";
                } else {
                    fiche.parentNode.parentNode.parentNode.removeAttribute("style");
                }
            }
        }
        function chercher_pays() {
            var recherche = removeAccents(document.getElementById("recherche_pays").value.toLowerCase());
            var fiches = document.getElementsByClassName("pays");
            for (var i = 0; i < fiches.length; i++) {
                var fiche = fiches[i];
                var nom = removeAccents(fiche.innerHTML.toLowerCase());
                if (nom.indexOf(recherche) == -1) {
                    parent = fiche.parentNode.parentNode.parentNode.parentNode.style.display = "none";
                } else {
                    fiche.parentNode.parentNode.parentNode.parentNode.removeAttribute("style");
                }
            }
        }
        function chercher_continent() {
            var recherche = removeAccents(document.getElementById("continent").value.toLowerCase());
            var fiches = document.getElementsByClassName("continent");
            for (var i = 0; i < fiches.length; i++) {
                var fiche = fiches[i];
                var nom = removeAccents(fiche.innerHTML.toLowerCase());
                if (nom.indexOf(recherche) == -1) {
                    parent = fiche.parentNode.parentNode.parentNode.parentNode.style.display = "none";
                } else {
                    fiche.parentNode.parentNode.parentNode.parentNode.removeAttribute("style");
                }
            }
        }
        </script>
    @include('nav')
    <section class="text-gray-600 bg-white body-font m-6 rounded-lg">
        <div class="container px-5 py-6 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Découvrez où nos étudiants ont choisi de partir pour leur mobilité internationale!</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Discover where our students have chosen to go for their international mobility and gain valuable insights into their enriching experiences. Explore the various destinations they have chosen and start planning your own study abroad journey.</p>
            </div>
            <div class="flex flex-wrap w-full justify-center mb-4">
                <div class="p-2 w-5/6 md:w-1/4 mx-4 mb-2 flex justify-between text-gray-600 border-2 border-indigo-400 bg-white  rounded-lg text-sm">
                    <input class="focus:outline-none w-full" type="text" name="query" id="recherche" placeholder="Recherche par université..." onkeyup="chercher()">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </div>
                <div class="p-2 w-5/6 md:w-1/4 mx-4 mb-2 flex justify-between text-gray-600 border-2 border-indigo-400 bg-white  rounded-lg text-sm">
                    <input class="focus:outline-none w-full" type="text" name="query" id="recherche_pays" placeholder="Recherche par pays..." onkeyup="chercher_pays()">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </div>
                <select name="continent" id="continent" onchange="chercher_continent()" class="p-2 h-10 w-5/6 md:w-1/5 mx-4 mb-2 flex justify-between text-gray-600 border-2 border-indigo-400 bg-white  rounded-lg text-sm">
                    <option value="">Recherche par continent...</option>
                    <option value="europe">Europe</option>
                    <option value="asie">Asie</option>
                    <option value="afrique">Afrique</option>
                    <option value="amerique du Nord">Amérique du Nord</option>
                    <option value="amerique du Sud">Amérique du Sud</option>
                    <option value="oceanie">Océanie</option>
                </select>
            </div>
            <div class="flex flex-wrap">
                @foreach($destinations as $destination)
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    @if(session('isPolytech') == true || (session('isAdmin') == true || session('isEditeur') == true))
                    <a href="/destination/{{$destination->nom}}">
                    @else
                    <a href="/auth/login">
                    @endif
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-3" src="{{$photos[$destination->nom]->url ?? 'En attente de photo'}}" alt="content">
                        <div class="flex">
                            <h3 class="pays tracking-widest text-indigo-500 text-xs font-medium title-font">{{$destination->pays}} ,</h3>
                            <h3 class="continent tracking-widest text-indigo-500 text-xs font-medium title-font"> {{$destination->continent}}</h3>
                        </div>
                        <h2 class="nom text-lg text-gray-900 font-medium title-font mb-1">{{$destination->nom}}</h2>
                    </div>
                    @if(session('isPolytech') == true || (session('isAdmin') == true || session('isEditeur') == true))
                    </a>
                    @else
                    </p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
<footer>
    @include('footer')
</footer>