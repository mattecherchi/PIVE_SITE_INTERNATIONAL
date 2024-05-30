<x-layout-admin>
    <x-slot name='articles'>
		<style>
            #articles {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
        <script>
            function supprimage(lien){
                unlink(lien);
            }
        </script>
	</x-slot>
    <x-slot name='panel'>
    <!-- Formulaire qui permet de créer un article avec un titre, un contenu et une image, utilise des classes tailwind css pour le style-->
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
                        Titre
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" name="titre" value="{{$article->titre ?? ''}}" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-content">
                        Contenu
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="contenu" placeholder="Contenu de l'article" required>{{$article->contenu ?? ''}}</textarea>
                </div>
            </div>
            <div class=" mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-image">Image</label>
                @if(isset($article))
                @if(!$article->lienimage ?? ''=="")
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" name="image" accept="image/*">
                @else
                <div class="flex">
                    <p class="px-3 py-2 text-gray-700 text-sm font-medium">{{$article->lienimage}}</p>
                    <a href="/admin/article/{{$article->id}}/deleteimg">
                        <button class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                    </a>
                </div>
                @endif
                @else
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" name="image" accept="image/*">
                @endif
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                        Sauvegarder
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
</x-layout-admin>