<x-layout-admin>
    <x-slot name='blogs'>
		<style>
            #blogs {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <script>
            function chercher() {
                var recherche = document.getElementById("recherche").value;
                var fiches = document.getElementsByClassName("fichier");
                for (var i = 0; i < fiches.length; i++) {
                    var fiche = fiches[i];
                    var nom = fiche.innerHTML;
                    if (nom.toLowerCase().indexOf(recherche.toLowerCase()) == -1) {
                        parent = fiche.parentNode.style.display = "none";
                    } else {
                        fiche.parentNode.removeAttribute("style");
                    }
                }
            }
            function copier(url){
                var copie = document.createElement("input");
                copie.setAttribute("value", "https://international.polytech-nancy.univ-lorraine.fr/storage/"+ url);
                document.body.appendChild(copie);
                copie.select();
                document.execCommand("copy");
                document.body.removeChild(copie);
                var message=document.createElement("p");
                document.body.appendChild(message);
                message.innerHTML="Lien copié !";
                message.style.color="blue";
                message.style.fontSize="20px";
                message.style.position="absolute";
                message.style.top="50%";
                message.style.left="50%";
                message.style.backgroundColor="lightgray";
                message.style.transform="translate(-50%,-50%)";
                message.setAttribute("class","rounded-lg p-2");
                setTimeout(function(){
                    document.body.removeChild(message);
                },2000);
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
        <div class="flex flex-col m-4 flex-grow">
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col mb-5 flex-grow">
                        <h1 class="text-2xl text-gray-600 mb-2">Ajouter un fichier</h1>
                        <div class="p-2 w-1/2 mx-0 flex justify-between text-gray-600 items-center border-2 border-gray-300 bg-white  rounded-lg text-sm">
                            <input class="focus:outline-none w-full" type="file" name="blog" accept=".pdf" required>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Ajouter
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="p-2 w-1/3 mx-0 flex justify-between text-gray-600 border-2 border-gray-300 bg-white  rounded-lg text-sm">
                <input class="focus:outline-none w-full" type="text" name="query" id="recherche" placeholder="Chercher..." onkeyup="chercher()">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </div>
            <div class="overflow-x-auto border-2 flex-grow w-full border-gray-300 rounded-lg mt-2">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom Fichier
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
                                @foreach($blogs as $blog)
                                <tr>
                                    <td class="fichier p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        {{substr($blog->url,6)}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        {{$blog->created_at}}
                                    </td>
                                    <td class="flex flex-row m-2">
                                        <a href="/storage/{{$blog->url}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">
                                            Voir
                                        </a>
                                        <button type="button" form="block" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick="copier('{{$blog->url}}')">
                                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                                <path d="M53.9791489,9.1429005H50.010849c-0.0826988,0-0.1562004,0.0283995-0.2331009,0.0469999V5.0228
                                                C49.7777481,2.253,47.4731483,0,44.6398468,0h-34.422596C7.3839517,0,5.0793519,2.253,5.0793519,5.0228v46.8432999
                                                c0,2.7697983,2.3045998,5.0228004,5.1378999,5.0228004h6.0367002v2.2678986C16.253952,61.8274002,18.4702511,64,21.1954517,64
                                                h32.783699c2.7252007,0,4.9414978-2.1725998,4.9414978-4.8432007V13.9861002
                                                C58.9206467,11.3155003,56.7043495,9.1429005,53.9791489,9.1429005z M7.1110516,51.8661003V5.0228
                                                c0-1.6487999,1.3938999-2.9909999,3.1062002-2.9909999h34.422596c1.7123032,0,3.1062012,1.3422,3.1062012,2.9909999v46.8432999
                                                c0,1.6487999-1.393898,2.9911003-3.1062012,2.9911003h-34.422596C8.5049515,54.8572006,7.1110516,53.5149002,7.1110516,51.8661003z
                                                 M56.8888474,59.1567993c0,1.550602-1.3055,2.8115005-2.9096985,2.8115005h-32.783699
                                                c-1.6042004,0-2.9097996-1.2608986-2.9097996-2.8115005v-2.2678986h26.3541946
                                                c2.8333015,0,5.1379013-2.2530022,5.1379013-5.0228004V11.1275997c0.0769005,0.0186005,0.1504021,0.0469999,0.2331009,0.0469999
                                                h3.9682999c1.6041985,0,2.9096985,1.2609005,2.9096985,2.8115005V59.1567993z"/>
                                                <path d="M38.6031494,13.2063999H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0158005
                                                    c0,0.5615997,0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4542999,1.0158997-1.0158997
                                                    C39.6190491,13.6606998,39.16465,13.2063999,38.6031494,13.2063999z"/>
                                                <path d="M38.6031494,21.3334007H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0157986
                                                    c0,0.5615005,0.4544001,1.0159016,1.0159006,1.0159016h22.3491974c0.5615005,0,1.0158997-0.454401,1.0158997-1.0159016
                                                    C39.6190491,21.7877007,39.16465,21.3334007,38.6031494,21.3334007z"/>
                                                <path d="M38.6031494,29.4603004H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                    s0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4543991,1.0158997-1.0158997
                                                    S39.16465,29.4603004,38.6031494,29.4603004z"/>
                                                <path d="M28.4444485,37.5872993H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                    s0.4544001,1.0158997,1.0159006,1.0158997h12.1904964c0.5615025,0,1.0158005-0.4543991,1.0158005-1.0158997
                                                    S29.0059509,37.5872993,28.4444485,37.5872993z"/>
                                            </svg>
                                        </button>
                                        <form id="block" method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$blog->id}}" />
                                            <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                                                </svg>
                                            </button>
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