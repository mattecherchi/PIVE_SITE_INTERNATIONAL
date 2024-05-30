<x-layout-admin>
    <x-slot name='accueil'>
        <style>
            #accueil {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            ;
        </style>
    </x-slot>
    <x-slot name='panel'>
        <script>
            function afficher_msgaccueil() {
                var msgaccueil = document.getElementById("msgaccueil");
                msgaccueil.style.display = "block";
                document.getElementById("btnmsgaccueil").style.display = "none";
            }

            function afficherMasquer(element) {
                img = document.getElementById(element);
                if (img.style.display == "none") {
                    img.style.display = "block";
                } else {
                    img.style.display = "none";
                }
            }

            function supprimage(element) {
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "<input name='deleteimg[]' value='" + element + "' class='hidden'>";
                document.getElementById('suppr').appendChild(newdiv);
                document.getElementById(element).parentNode.remove();
            }
        </script>

        <body>
            <div class="bg-white shadow-lg border border-gray-200 rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Gestion Page d'accueil</h3>
                        <span class="text-base font-normal text-gray-500">Vous pouvez ici modifier le contenu de la page d'accueil, comme le texte, les photos et les liens</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex flex-col border border-gray-200 items-center bg-white shadow-lg rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Message Important</h3>
                        <span class="text-base font-normal text-gray-500">Vous pouvez ici ajouter, modifier et supprimer un message important qui s'affichera sur la page d'accueil</span>
                    </div>
                </div>
                @if($msgaccueil->titre=="")
                <span class="text-base font-normal text-gray-500 m-4">Aucun message important n'est actuellement enregistré</span>
                @endif
                <div class="flex flex-col items-center">
                    @if($msgaccueil->titre=="")
                    <button class='bg-blue-500 m-2 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="btnmsgaccueil" onclick="afficher_msgaccueil()">Ajouter un message</button>
                    @endif
                    <form method="POST" action="/admin/msgaccueil">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class='m-2 bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2 mt-5'>Supprimer le message important</button>
                    </form>
                </div>
                <form class="w-full" method="POST" action="/admin/msgaccueil" id="msgaccueil" style="<?php if ($msgaccueil->titre == "") echo ("display:none"); ?>">
                    @csrf
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-full grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Titre</label>
                            <input name="titre" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value="{{$msgaccueil->titre}}" type="text" required />
                        </div>
                        <div class="w-full grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Contenu</label>
                            <textarea name="contenu" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{$msgaccueil->contenu}}</textarea>
                        </div>
                        <button type="submit" class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2 mt-5 mx-7'>Enregistrer</button>
                    </div>
                </form>

            </div>
            <form method="post" enctype="multipart/form-data" action="{{action('IndexController@saveIndex')}}">
                @csrf
                <div id="suppr"></div>
                <div class="flex items-center justify-center  mt-10 mb-10">
                    <div class="grid bg-white rounded-lg border border-gray-200 shadow-lg w-full md:w-11/12">
                        <div class="flex justify-center">
                            <div class="flex">
                                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Modification de la page d'accueil</h1>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Titre</label>
                            <textarea name="titre" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->titre)}}</textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Images</label>
                            @foreach($photos as $photo)
                            <?php
                            $url = $photo->nom;
                            $img = explode("/", $photo->nom)[0];
                            ?>
                            <div class="flex space-x-4">
                                <span class="px-3 py-2 text-sm font-medium">{{$img}}</span>
                                <button onclick="afficherMasquer('{{ $url }}')" type="button" class="hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Afficher/Masquer</button>
                                <button onclick="supprimage('{{ $url }}')" type="button" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                                <img id='{{$url}}' style="display: none" class="object-contain w-1/2 h-1/2" src="{{asset('img/hero/imageIndex'.$photo->nom)}}" />
                            </div>
                            @endforeach
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ajouter de nouvelles images</label>
                            <input name="indexphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Description</label>
                            <textarea name="description" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->description)}}
                            </textarea>
                        </div>
                        <div class="flex mt-4 ml-4">
                            <h1 class="text-gray-600 font-bold md:text-xl text-xl">Modification du contenu des rubriques</h1>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Titre Rubrique n°1</label>
                            <textarea name="titreR1" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->titreRubrique1)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Paragraphe Rubrique n°1</label>
                            <textarea name="paragrapheR1" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->paragrapheRubrique1)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Lien Rubrique n°1</label>
                            <textarea name="lienR1" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->lienRubrique1)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Titre Rubrique n°2</label>
                            <textarea name="titreR2" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->titreRubrique2)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Paragraphe Rubrique n°2</label>
                            <textarea name="paragrapheR2" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->paragrapheRubrique2)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Lien Rubrique n°2</label>
                            <textarea name="lienR2" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->lienRubrique2)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Titre Rubrique n°3</label>
                            <textarea name="titreR3" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->titreRubrique3)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Paragraphe Rubrique n°3</label>
                            <textarea name="paragrapheR3" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->paragrapheRubrique3)}}
                            </textarea>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Lien Rubrique n°3</label>
                            <textarea name="lienR3" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$index->lienRubrique3)}}</textarea>
                        </div>
                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="submit">Sauvegarder les modifications</button>
                        </div>

                    </div>
                </div>
            </form>
        </body>
    </x-slot>
</x-layout-admin>