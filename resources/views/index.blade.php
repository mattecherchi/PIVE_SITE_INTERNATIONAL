<!DOCTYPE html>
<html class="bg-gray-200" lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Polytech Nancy International</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  @include("nav")
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  window.onload = function() {
    $('#msg, #overlay-back').fadeIn(500);
  }

  function cacher_msg() {
    $('#msg, #overlay-back').fadeOut(500);
  }
</script>

<body class="">
  @if($msgaccueil->titre!="")
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
  <div class="rounded-lg" id="msg" style="position   : absolute;
            top        : 10%;
            left       : 30%;
            right: 30%;
            z-index    : 5;
            background:white;
            display    : none;">
    <div class="text-center mb-20">
      <h1 class="sm:text-3xl mt-4 text-2xl font-medium title-font text-blue-900 mb-4">{{$msgaccueil->titre}}</h1>
      <p class="text-base w-auto h-auto leading-relaxed mx-auto text-gray-500">{{$msgaccueil->contenu}}</p>
    </div>
    <button id="msgbtn" onclick="cacher_msg()" class="flex items-center justify-center ml-5 mb-5 bg-blue-500 text-white text-sm font-bold px-4 py-2 rounded-full my-2">
      <span class="text-white">OK</span>
    </button>
  </div>
  @endif
  <section class="text-gray-600 body-font bg-white m-6 rounded-lg">
    <div class="swiper hero">
      <div class="swiper-wrapper">
        @foreach($photos as $photo)
        <div class="swiper-slide">
          <img class="object-contain hidden md:block w-full max-h-72 rounded-t-lg" src="{{ asset('img/hero/imageIndex'.$photo->nom) }}" alt="image" />
        </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="container px-5 py-10 mx-auto">
      <div class="text-center mb-10">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{$index->titre}}</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">{{$index->description}}</p>
        <div class="flex mt-6 justify-center">
          <div class="w-3/4 border-t-8 border-blue-600 border-dotted inline-flex"></div>
        </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" class="w-10 h-10" width="512px" height="512px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
              <path fill="var(--ci-primary-color, currentColor)" d="M334.627,16H48V496H472V153.373ZM440,166.627V168H320V48h1.373ZM80,464V48H288V200H440V464Z" class="ci-primary" />
              <rect width="224" height="32" x="136" y="296" fill="var(--ci-primary-color, currentColor)" class="ci-primary" />
              <rect width="224" height="32" x="136" y="376" fill="var(--ci-primary-color, currentColor)" class="ci-primary" />
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{$index->titreRubrique1}}</h2>
            <p class="leading-relaxed text-base">{{$index->paragrapheRubrique1}}</p>
            <a href="{{$index->lienRubrique1}}" class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" class="w-10 h-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
              <g>
                <path d="M79.9,23.4c0-4-3.5-6.5-7.8-6.5c0,0-16.4,0-16.3,0c-4.2,0-7.8,2.5-7.8,6.5v11H32.7v76.5h62.6V34.4H79.9V23.4z M74.2,34.4
                  H53.7V23.1h20.5V34.4z" />
                <path d="M7.2,45.8c0,0.2,0,53.3,0,53.3c0,7.4,5.6,11.7,11.4,11.7H27V34.2h-8.4C12.7,34.2,7.2,39.2,7.2,45.8z" />
                <path d="M109.4,34.2H101v76.6h8.4c5.8,0,11.4-4.3,11.4-11.7c0,0,0-53.1,0-53.3C120.8,39.2,115.3,34.2,109.4,34.2z" />
              </g>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{$index->titreRubrique2}}</h2>
            <p class="leading-relaxed text-base">{{$index->paragrapheRubrique2}}</p>
            <a href="{{$index->lienRubrique2}}" class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" class="w-10 h-10" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
              <g>
                <path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z" />
                <path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991 c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z" />
                <path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{$index->titreRubrique3}}</h2>
            <p class="leading-relaxed text-base">{{$index->paragrapheRubrique3}}</p>
            <a href="{{$index->lienRubrique3}}" class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <a href="/destinations">
        <button class="flex mx-auto mt-10 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Découvrir nos destinations</button>
      </a>
    </div>
  </section>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.hero', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
<footer>
  @include("footer")
</footer>

</html>