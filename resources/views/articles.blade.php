<!DOCTYPE html>
<html class="bg-gray-200" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    @include(" nav")
</head>

<body>
    <div class="bg-white rounded-lg p-5 pt-10 mt-10  mx-6">
        <div class="flex flex-wrap w-full mb-5">
                <div class="lg:w-2/3 w-full mb-2 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Découvrez des articles et informations pratiques pour préparer au mieux votre mobilité !</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <p class="lg:w-1/3 w-full leading-relaxed text-gray-500">Discover different articles and information pages to beter prepare yourself for your international journey !</p>
        </div>
        <div class="flex">
            <div class="md:hidden max-w-full">
                @foreach($articles as $article)
                <div class="md:m-5 my-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl hover:shadow-blue-700 dark:bg-gray-800 dark:border-gray-700">
                    @if($article->lienimage!="")
                    <img class="rounded-t-lg max-h-60" src="{{$article->lienimage}}" alt="">
                    @endif
                    <div class="p-4">
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{date("F", mktime(0, 0, 0, $article->updated_at->month, 1))}}, {{$article->updated_at->year}}</p>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->titre}}</h2>
                        <p class="max-h-20 text-ellipsis overflow-hidden mb-3 font-normal text-gray-700 dark:text-gray-400">{{$article->contenu}}</p>
                        <a href="/article/{{$article->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lire l'article
                            <svg class="ml-2 rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-1/2 hidden md:block">
                @foreach($articles as $article)
                @if($article->id %2===0)
                <div class="m-2 md:m-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl hover:shadow-blue-700 dark:bg-gray-800 dark:border-gray-700">
                    @if($article->lienimage!="")
                    <img class="rounded-t-lg max-h-60 w-full" src="{{$article->lienimage}}" alt="">
                    @endif
                    <div class="p-4">
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{date("F", mktime(0, 0, 0, $article->updated_at->month, 1))}}, {{$article->updated_at->year}}</p>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->titre}}</h2>
                        <p class="max-h-20 text-ellipsis overflow-hidden mb-3 font-normal text-gray-700 dark:text-gray-400">{{$article->contenu}}</p>
                        <a href="/article/{{$article->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lire l'article
                            <svg class="ml-2 rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="w-1/2 hidden md:block">
                @foreach($articles as $article)
                @if($article->id %2===1)
                <div class="m-2 md:m-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl hover:shadow-blue-700 dark:bg-gray-800 dark:border-gray-700">
                    @if($article->lienimage!="")
                    <img class="rounded-t-lg max-h-60 w-full" src="{{$article->lienimage}}" alt="">
                    @endif
                    <div class="p-4">
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{date("F", mktime(0, 0, 0, $article->updated_at->month, 1))}}, {{$article->updated_at->year}}</p>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->titre}}</h2>
                        <p class="max-h-20 text-ellipsis overflow-hidden mb-3 font-normal text-gray-700 dark:text-gray-400">{{$article->contenu}}</p>
                        <a href="/article/{{$article->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lire l'article
                            <svg class="ml-2 rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
    </div>
</body>
<footer>
    @include("footer")
</footer>

</html>