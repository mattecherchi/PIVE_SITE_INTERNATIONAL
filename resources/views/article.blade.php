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
  <div class="bg-white rounded-lg px-5 py-5 mx-6 flex flex-col">
    <h1 class="sm:text-3xl text-2xl md:text-center font-medium title-font text-gray-900 mb-4">{{$article->titre}}</h1>
    <div class="mb-8 h-1 w-20 md:w-60 md:text-center md:mx-auto bg-indigo-500 rounded"></div>
    @if($article->lienimage!=="")
    <div class="flex justify-center">
    <img class="rounded-lg mb-8 md:w-3/4 item-center" src="{{asset($article->lienimage)}}" alt="" class="mx-auto">
    </div>
    @endif
    <div class="text-base break-all leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">{!! nl2br(e($article->contenu)) !!}</div>
  </div>
</body>
<footer>
  @include("footer")
</footer>

</html>