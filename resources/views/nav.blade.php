<nav class="bg-white p-2 m-6 rounded-lg text-gray-600 body-font">
  <div class="container flex flex-wrap items-center mx-auto">
    <a href="/" class="flex-shrink-0 flex items-center">
      <img class="h-8 " src="{{ asset('img/logo-p.png')}}" alt="Logo">
      <img class="m-2 h-8" src="{{ asset('img/logo-nom.png')}}" alt="Logo">
    </a>
    <div class="origin-right ml-auto flex lg:order-last">
      @if(!session()->has('uid'))
      <a href="/auth/login" class="text-blue-500 hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
        </svg>
      </a>
      @else
  
      <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"> 
        <p class="hidden lg:inline">{{session('prenom')}} {{session('nom')}} </p>
        <svg class="w-2.5 lg:ml-2 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>

      <!-- Dropdown menu -->
      <div id="dropdownHover" class="border border-solid border-blue-500 z-10 hidden bg-white border-10 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
            <li>
              <a href="/profil/candidature" class="block px-4 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Fiche candidature</a>
            </li>
            <li>
              <a href="/profil/fichiers" class="block px-4 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Dépot de fichiers</a>
            </li>
            <li>
              <a href="/profil/cv" class="block px-4 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Générateur de CV</a>
            </li>
          </ul>
            <div class="py-2">
              <a href="/auth/logout" class="block px-4 py-2 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Déconnexion </a>
            </div>
          
      </div>
      @endif
    </div>
    <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex justify-self-start items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
      <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="hidden w-full lg:block lg:w-auto ml-4 lg:py-1 lg:pl-4 lg:border-l lg:border-gray-400" id="mobile-menu">
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        <li>
          <a href="/" class="block py-2 pr-4 pl-3 hover:bg-blue-500 hover:text-white px-3 rounded-md text-sm font-medium">Accueil</a>
        </li>
        <li>
          <a href="/destinations" class="block py-2 pr-4 pl-3 hover:bg-blue-500 hover:text-white px-3 rounded-md text-sm font-medium">Destinations</a>
        </li>
        @if( (session('isPolytech') ==true && session('isEditeur') ==true) || session('isAdmin')==true )
        <li>
          <a href="/articles" class="block py-2 pr-4 pl-3 hover:bg-blue-500 hover:text-white px-3 rounded-md text-sm font-medium">Articles</a>
        </li>
        @endif
        @if(session()->has('uid') && (session('isAdmin') || session('isEditeur')))
        <li>
          <a href="/admin/accueil" class="block py-2 pr-4 pl-3 hover:bg-blue-500 hover:text-white px-3 rounded-md text-sm font-medium">Espace Admin</a>
        </li>
        @endif
      </ul>

    </div>
    
    
  </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>