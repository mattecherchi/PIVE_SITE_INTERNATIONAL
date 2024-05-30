<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body class="bg-gray-200">
    @include("nav")
    <main class="bg-white p-4 my-4 rounded-lg m-6">
        <article class="max-w-4xl mx-auto py-4">
            <h1 class="text-3xl font-bold">{{$destination->nom}}</h1>
            <p class="text-gray-500 font-thin mb-4">
              {{$destination->pays}},{{$destination->continent}}
            </p>
	    <div class="swiper intro">
            	<div class="swiper-wrapper">
                  @foreach($photos->where("categorie","intro") as $photo)
                  <div class="swiper-slide">
                    <img
                      class="object-contain w-full"
                      src="/{{$photo->url}}"
                      alt="image"
                    />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <h3 class="text-2xl font-semibold mt-2">Introduction</h3>
            <p class="mt-4 mb-6"><?php echo($destination->intro) ?></p>
            
            <h3 class="text-2xl font-semibold mt-4">Nos Ã©tudiants sur place</h3>
            <p class="mt-4 mb-6"><?php echo($destination->temoignages) ?></p>
            <div class="swiper temoignages">
                <div class="swiper-wrapper">
                  @foreach($photos->where("categorie","temoignages") as $photo)
                  <div class="swiper-slide">
                    <img
                      class="object-contain w-full max-h-screen py-5"
                      src="/{{$photo->url}}"
                      alt="image"
                    />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <h3 class="text-2xl mb-6 font-semibold">Liste des cours</h3>
            @foreach($listecours as $listecour)
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                  <a href="{{$listecour->lien}}" class="text-center">Ouvrir le PDF</a>
            </button>
            <div class="flex w-full justify-center max-w-4xl mx-auto">
                <!-- Affiche l'iframe sur les écrans larges -->
                <iframe src="{{$listecour->lien}}" width="1000" height="500" type="application/pdf" class="h-screen w-full hidden md:block"></iframe>                
            </div>
            @endforeach
            <h3 class="text-2xl mt-6 font-semibold">Blogs/Presentations rÃ©alisÃ©s par nos Ã©tudiants</h3>
            @foreach($blogs as $blog)
            <a href="{{$blog->lien}}"><p class="mt-4 mb-6 underline">{{$blog->nom}}</p></a>
            @endforeach
            <h3 class="text-2xl mt-6 font-semibold">Documentation, liens utiles.</h3>
            @foreach($liens as $lien)
            <a href="{{$lien->lien}}"><p class="mt-4 mb-6 underline">{{$lien->nom}}</p></a>
            @endforeach
            <h3 class="text-2xl mt-6 font-semibold">Astuces et informations complÃ©mentaires</h3>
            <p class="mt-4 mb-6"><?php echo($destination->astucesinfos) ?></p>
        </article>
    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.intro', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      var swiper = new Swiper('.temoignages', {
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