<x-layout-profil>
  <x-slot name='cv'>
  <style>
          #cv {
              background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
              --tw-text-opacity: 1;
              color: rgba(17, 24, 39, var(--tw-text-opacity));
          };
      </style>
</x-slot>
  <x-slot name='panel'>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Polytech Nancy International</title>
        <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
        <script src="https://unpkg.com/docx@7.1.0/build/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
        <script>
          var nbreProjets=0;
          var nbreExperiences=0;
          var nbreEducations=0;
          function newEduc(){
            nbreEducations+=1;
            var newdiv=document.createElement('div');
            newdiv.innerHTML="<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Previous curriculum / Cursus précédent :</label>"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">School name / Nom de l'établissement</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"nomeduc"+nbreEducations+"\" type=\"text\" placeholder=\"Napoleon High School\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Place / Lieu</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"lieueduc"+nbreEducations+"\" type=\"text\" placeholder=\"Paris, France\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Date</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"dateeduc"+nbreEducations+"\" type=\"text\" placeholder=\"2016\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Description</label>"+
                  "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"desceduc"+nbreEducations+"\" type=\"text\" placeholder=\"French Scientific “Baccalauréat”, equivalent to A-levels. &#10;European English section, graduated with honours (= mention Bien) / First class honours (= mention Très bien) (this is an example)\"></textarea>"+
                  "</div>"+
                "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppeduc(this)\">Delete this curriculum / Supprmier ce cursus</button>";
              document.getElementById('education').appendChild(newdiv);
              document.getElementById("nbreEduc").innerHTML=nbreEducations;
          };
          function newProjet(){
            nbreProjets+=1;
            var newdiv=document.createElement('div');
            newdiv.innerHTML="<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Projet "+(nbreProjets+1)+" :</label>"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Name of the project / Nom du projet</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"titreprojet"+nbreProjets+"\" type=\"text\" placeholder=\"Gymnasium Renovation\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Place / Lieu</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"lieuprojet"+nbreProjets+"\" type=\"text\" placeholder=\"Polytech Nancy\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Date</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"dateprojet"+nbreProjets+"\" type=\"text\" placeholder=\"September 2019 – June 2020\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Description</label>"+
                  "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"descprojet"+nbreProjets+"\" type=\"text\" placeholder=\"Worked in a team of …… &#10;Designed ……… &#10;Prepared and Presented ………\"></textarea>"+
                  "</div>"+
                "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppprojet(this)\">Delete this project / Supprmier ce projet</button>";
              document.getElementById('projets').appendChild(newdiv);
              document.getElementById("nbreProj").innerHTML=nbreProjets;
          };
          function newExp(){
            nbreExperiences+=1;
            var newdiv=document.createElement('div');
            newdiv.innerHTML="<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Expérience "+(nbreExperiences+1)+" :</label>"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Name of the Company / Nom de l'entreprise</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"nomexp"+nbreExperiences+"\" type=\"text\" placeholder=\"Law Office of Red, White and Blue\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Place / Lieu</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"lieuexp"+nbreExperiences+"\" type=\"text\" placeholder=\"Nancy, France\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Date</label>"+
                  "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"dateexp"+nbreExperiences+"\" type=\"text\" placeholder=\"June 2017\" />"+
                "</div>"+
                "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
                  "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Description</label>"+
                  "<textarea style=\"white-space: pre-wrap\" class=\"h-28 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" id=\"descexp"+nbreProjets+"\" type=\"text\" placeholder=\"Office Assistant: &#10; - Provide office support including filing, copying and out of office errands &#10; - Direct phone calls to staff in a friendly and efficient manner &#10; - Utilize Excel to maintain and update client database\"></textarea>"+
                  "</div>"+
                "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppexp(this)\">Delete this experience / Supprmier cette expérience</button>";
              document.getElementById('experiences').appendChild(newdiv);
              document.getElementById("nbreExp").innerHTML=nbreExperiences;
          };
          function suppprojet(btn){
            nbreProjets-=1;
            document.getElementById("nbreProj").innerHTML=nbreProjets;
            btn.parentNode.remove();
          };
          function suppexp(btn){
            nbreExperiences-=1;
            document.getElementById("nbreExp").innerHTML=nbreExperiences;
            btn.parentNode.remove();
          };
          function suppeduc(btn){
            nbreEducations-=1;
            document.getElementById("nbreEduc").innerHTML=nbreEducations;
            btn.parentNode.remove();
          };
        </script>
    </head>
    <body>
      <span class="hidden" id="nbreExp">0</span>
      <span class="hidden" id="nbreEduc">0</span>
      <span class="hidden" id="nbreProj">0</span>
        <div class="flex items-center justify-center mt-5">
            <div class="grid bg-white rounded-lg shadow-xl w-full">
              <div class="flex justify-center">
                <div class="flex">
                  <h1 class="text-gray-600 text-center font-bold md:text-2xl text-xl">Générateur de CV (remplissez les rubriques en anglais !!!)</h1>
                </div>
              </div>
          
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First name / Prénom</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="prenom" type="text" placeholder="Prénom" />
                </div>
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last name / Nom</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="nom" type="text" placeholder="Nom" />
                </div>
              </div>
              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address / Adresse</label>
                <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="adresse" type="text" placeholder="Adresse" />
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">City / Ville</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="ville" type="text" placeholder="Ville" />
                </div>
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Zip code / Code postal</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="codepostal" type="text" placeholder="Code postal" />
                </div>
              </div>
              
              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Mail address / Adresse mail</label>
                <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="mail" type="text" placeholder="exemple@etu.univ-lorraine.fr" />
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone number / Numéro de téléphone</label>
                <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="numtel" type="text" placeholder="06XXXXXXXX" />
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Upload your photo / Téléverser votre photo (format 4:3)</label>
                <input name="photo" id="photo" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file">
              </div>
              
              <div id="education">
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Education / Scolarité</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Current curriculum / Cursus actuel :</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Date d'entrée à Polytech</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="dateeduc0" type="text" placeholder="2021" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                  <textarea style="white-space: pre-wrap" class="h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="desceduc0" type="text" 
                  placeholder="Majoring in XXX (see Polytech Website for degree names in English)  &#10;Relevant Coursework: Mathematics, Physics, etc. (list your courses)"></textarea>
                </div>
              </div>  
              <input type="hidden" id="nomeduc0" value="Polytech Nancy - Graduate School of Engineering"/>
              <input type="hidden" id="lieueduc0" value="Nancy, France"/>        
              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="newEduc()">Add a curriculum / Ajouter un cursus</button>
              </div>
              <div id="projets">
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Talk about your engineering projects / Parlez de vos projets</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Projet 1 :</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name of the project / Nom du projet</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="titreprojet0" type="text" placeholder="Gymnasium Renovation" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Place / Lieu</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="lieuprojet0" type="text" placeholder="Polytech Nancy" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Date</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="dateprojet0" type="text" placeholder="September 2019 – June 2020" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                  <textarea style="white-space: pre-wrap" class="h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="descprojet0" type="text" 
                  placeholder="Worked in a team of …… &#10;Designed ……… &#10;Prepared and Presented ………"></textarea>
                </div>
              </div>          
              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="newProjet()">Add a project / Ajouter un projet</button>
              </div>
              <div id="experiences">
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Professional experience / Expériences professionnelles</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Expérience 1 :</label>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name of the company / Nom de l'entreprise</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="nomexp0" type="text" placeholder="Law Office of Red, White and Blue" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Place / Lieu</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="lieuexp0" type="text" placeholder="Nancy, France" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Date</label>
                  <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="dateexp0" type="text" placeholder="June 2017" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                  <textarea style="white-space: pre-wrap" class="h-28 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="descexp0" type="text" 
                  placeholder="Office Assistant: &#10; - Provide office support including filing, copying and out of office errands &#10; - Direct phone calls to staff in a friendly and efficient manner &#10; - Utilize Excel to maintain and update client database"></textarea>
                </div>
              </div>          
              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5 mx-7'>
                <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="newExp()">Add an experience / Ajouter une expérience</button>
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Computer skills / Compétences informatique</label>
                <textarea class="h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="informatique" type="text" 
                placeholder="Software: AutoCAD, Microsoft Word, Excel, PowerPoint (these are just examples) &#10;Programming Languages: Java, C++ &#10;Operating Systems: Windows, Mac OS X, Linux, UNIX"></textarea>
              </div>


              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Languages / Langues</label>
                <textarea style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="langues" type="text" placeholder="French: Native &#10;English: (Beginner, Intermediate, Advanced) Toeic Score: 785"></textarea>
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Activities and centers of interest (should show your qualities) / Activités et centres d'intérets (doivent montrer vos qualités)</label>
                <textarea class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="activites" type="text" placeholder="Décrivez vos activités et centres d'intérets"></textarea>
              </div>

              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="generate()">Generate my CV / Générer mon CV</button>
              </div>

            </div>
          </div>
    </body>
    <footer>
    <script src="{{ asset('js/generateur_cv.js')}}"></script>
    </footer>
    </html>
  </x-slot>
</x-layout-profil>