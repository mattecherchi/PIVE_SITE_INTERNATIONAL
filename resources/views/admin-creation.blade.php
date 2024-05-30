<x-layout-admin>
    <x-slot name='tableau'>
		<style>
            #gestion {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <script>
            function newCours(){
                var newdiv=document.createElement('div');
                newdiv.innerHTML="<div><div class=\"grid grid-cols-5 mt-5 mx-7\">"+
                "<div class=\"grid grid-cols-1\">"+
                "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Semestre :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"semestre[]\" type=\"number\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"code[]\" type=\"text\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"titre[]\" type=\"text\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"ects[]\" type=\"number\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nombre[]\" type=\"number\"/>"+
                    "</div></div>"+
                    "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>"+
                    "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"contenu[]\" type=\"text\"></textarea>"+
                    "</div>"+
                    "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppCours(this)\">Supprimer ce cours</button></div>";
                document.getElementById('cours').appendChild(newdiv);
            };
            function suppCours(btn){
                btn.parentNode.remove();
            };
            function newListecour(){
                var newdiv=document.createElement('div');
                newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
                "<div class=\"grid grid-cols-1\">"+
                "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomlistecour[]\" type=\"text\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienlistecour[]\" type=\"text\"/>"+
                    "</div></div>"+
                    "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppListecour(this)\">Supprimer cette liste de cours</button></div>";
                document.getElementById('listecour').appendChild(newdiv);
            };
            function suppListeCour(btn){
                btn.parentNode.remove();
            };
            function newBlog(){
                var newdiv=document.createElement('div');
                newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
                "<div class=\"grid grid-cols-1\">"+
                "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomblog[]\" type=\"text\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienblog[]\" type=\"text\"/>"+
                    "</div></div>"+
                    "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppBlog(this)\">Supprimer ce blog</button></div>";
                document.getElementById('blog').appendChild(newdiv);
            };
            function suppBlog(btn){
                btn.parentNode.remove();
            };
            function newLien(){
                var newdiv=document.createElement('div');
                newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
                "<div class=\"grid grid-cols-1\">"+
                "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomlien[]\" type=\"text\"/>"+
                    "</div>"+
                    "<div class=\"grid grid-cols-1 ml-1\">"+
                    "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
                    "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienlien[]\" type=\"text\"/>"+
                    "</div></div>"+
                    "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppLien(this)\">Supprimer ce lien</button></div>";
                document.getElementById('lien').appendChild(newdiv);
            };
            function suppLien(btn){
                btn.parentNode.remove();
            };
        </script>
        <form method="post" enctype="multipart/form-data" action="">
            @csrf
            <div class="flex items-center justify-center mt-10 mb-10">
                <div class="grid bg-white rounded-lg shadow-xl w-full md:w-11/12">
                    <div class="flex justify-center text-red-600 font-bold md:text-2xl text-xl">
                        <?php if(isset($_GET["erreur"])) echo($_GET["erreur"].", veuillez réessayer");?>
                    </div>
                    <div class="flex justify-center">
                        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Ajout d'une nouvelle destination</h1>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Nom</label>
                        <input name="nom" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required/>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Pays</label>
                        <input name="pays" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required/>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Continent</label>
                        <!-- <input name="continent" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required/> -->
                        <select id="countries" name="continent" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            <option selected>Choisi un continent</option>
                            <option value="Europe">Europe</option>
                            <option value="Afrique">Afrique</option>
                            <option value="Océanie">Océanie</option>
                            <option value="Asie">Asie</option>
                            <option value="Amérique du Nord">Amérique du Nord</option>
                            <option value="Amérique du Sud">Amérique du Sud</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Introduction</label>
                        <textarea name="intro" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required></textarea>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Ajouter des images</label>
                        <input name="introphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Témoignages</label>
                        <textarea name="temoignages" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required></textarea>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Ajouter des images</label>
                        <input name="temoignagesphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
                    </div>
                    <div id="listecour" div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liste des cours</label>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newListecour()">Ajouter une liste de cours</button>
                    </div>
                    <div id="blog" div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Blogs réalisés par les étudiants</label>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newBlog()">Ajouter un blog</button>
                    </div>
                    <div id="lien" div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liens utiles</label>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newLien()">Ajouter un lien</button>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Astuces et informations complémentaires</label>
                        <textarea name="astucesinfos" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required></textarea>
                    </div>
                
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="submit">Créer la page</button>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>
</x-layout-admin>