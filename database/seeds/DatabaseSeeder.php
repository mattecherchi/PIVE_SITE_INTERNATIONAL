<?php

use Illuminate\Database\Seeder;
use App\Destination;
use App\Assoblog;
use App\Assolien;
use App\Assoimage;
use App\Assocours;
use App\Admin;
use App\Index;
use App\Images_index;
use App\VariableGlobal;
use App\msgaccueil;
use App\Filieres;
use App\Specialites;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $fred = new Admin();
        $fred->uid = "wagner228u";
        $fred->save();
        $ayoub = new Admin();
        $ayoub->uid = "echchama1u";
        $ayoub->save();
        $lucas = new Admin();
        $lucas->uid = "schwing3u";
        $lucas->save();
        $bunting = new Admin();
        $bunting->uid = "bunting1";
        $bunting->save();
        $pincetic = new Admin();
        $pincetic->uid = "pincetic5";
        $pincetic->save();
        for ($j = 0; $j < 4; $j++) {
            $faker = Faker\Factory::create();
            $destination = new Destination();
            $nom = $faker->city;
            $destination->nom = $nom;
            $destination->pays = $faker->country;
            $destination->continent = $faker->countryCode();
            $destination->intro = $faker->text;
            $destination->temoignages = $faker->text;
            $destination->astucesinfos = $faker->text;
            $destination->save();
            for ($i = 0; $i < 3; $i++) {
                $assoimage = new Assoimage();
                $assoimage->nom = $nom;
                $assoimage->categorie = "intro";
                $assoimage->url = $faker->imageUrl();
                $assoimage->save();
            }
            for ($i = 0; $i < 3; $i++) {
                $assoimage = new Assoimage();
                $assoimage->nom = $nom;
                $assoimage->categorie = "temoignages";
                $assoimage->url = $faker->imageUrl();
                $assoimage->save();
            }
            for ($i = 0; $i < 3; $i++) {
                $assoblog = new Assoblog();
                $assoblog->nomdestination = $nom;
                $assoblog->nom = $faker->text(10);
                $assoblog->lien = $faker->url;
                $assoblog->save();
            }
            for ($i = 0; $i < 3; $i++) {
                $assolien = new Assolien();
                $assolien->nomdestination = $nom;
                $assolien->nom = $faker->text(10);
                $assolien->lien = $faker->url;
                $assolien->save();
            }
            for ($i = 0; $i < 3; $i++) {
                $assocours = new Assocours();
                $assocours->nomdestination = $nom;
                $assocours->code = $faker->text(10);
                $assocours->titre = $faker->text(10);
                $assocours->semestre = $faker->numberBetween(7, 10);
                $assocours->ects = $faker->numberBetween(1, 10);
                $assocours->nombre = $faker->numberBetween(5, 100);
                $assocours->contenu = $faker->text(50);
                $assocours->save();
            }
        }
        $index = new Index();
            $index->titre = 'Site Intranet des Relations Internationales de POLYTECH Nancy';
            $index->description = 'Polytech Nancy offre une vaste liste de destinations internationales pour ses étudiants qui souhaitent effectuer un séjour à l\'étranger, et les accompagne dans toutes les démarches pour garantir leur réussite.';
            $index->titreRubrique1 = 'Description générale';
            $index->paragrapheRubrique1 = 'Voici une explication assez générale et rapide sur les échanges Erasmus: qu’est-ce que c’est, qui sont les personnes éligibles, quelles sont les procédures, etc.. Vous trouverez les informations ...';
            $index->lienRubrique1 = 'https://polytech-nancy.univ-lorraine.fr';
            $index->titreRubrique2 = 'Avant de partir';
            $index->paragrapheRubrique2 = 'Pour le choix des cours dans l’université étrangère, allez sur le site web de l’université et le programme des études se trouve généralement dans la rubrique Studies, Master Programmes, ...';
            $index->lienRubrique2 = 'https://polytech-nancy.univ-lorraine.fr';
            $index->titreRubrique3 = 'Contacts et liens utiles';
            $index->paragrapheRubrique3 = 'GÖTEBORG, SUEDE Groupe Facebook Français à Göteborg Erasmus 2014/2015 (vous pouvez voir des annonces de logements qui se libèrent) Erasmus 2015/2016 Annonces de logements Voyages Scandinavian ...';
            $index->lienRubrique3 = 'https://polytech-nancy.univ-lorraine.fr';
            $index->save();
            $variables=new VariableGlobal();
            $variables->datelimite_candidature=date('Y-m-d',strtotime('2099-12-31'));
            $variables->save();
            $msgaccueil=new msgaccueil();
            $msgaccueil->titre="";
            $msgaccueil->contenu="";
            $msgaccueil->save();
            $filieres=new Filieres();
            $filieres->nom_filiere="IA2R";
            $filieres->save();
            $filieres=new Filieres();
            $filieres->nom_filiere="EMME";
            $filieres->save();
            $filieres=new Filieres();
            $filieres->nom_filiere="M3";
            $filieres->save();
            $specialites=new Specialites();
            $specialites->nom_spe="SIA";
            $specialites->nom_filiere="IA2R";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="SIR";
            $specialites->nom_filiere="IA2R";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="MFE";
            $specialites->nom_filiere="EMME";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="MSM";
            $specialites->nom_filiere="EMME";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="IE";
            $specialites->nom_filiere="EMME";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="MSS";
            $specialites->nom_filiere="M3";
            $specialites->save();
            $specialites=new Specialites();
            $specialites->nom_spe="MCL";
            $specialites->nom_filiere="M3";
            $specialites->save();
    }
}
