<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Index;
use App\Images_index;
use App\msgaccueil;

class IndexController extends Controller
{
    public function savemsgaccueil(Request $request)
    {
        $anciens = msgaccueil::all();
        foreach ($anciens as $ancien) {
            $ancien->delete();
        }
        $msgaccueil = new msgaccueil();
        $msgaccueil->titre = $request->input('titre');
        $msgaccueil->contenu = $request->input('contenu');
        $msgaccueil->save();
        return redirect('/admin/accueil');
    }
    public function removemsgaccueil()
    {
        $anciens = msgaccueil::all();
        foreach ($anciens as $ancien) {
            $ancien->delete();
        }
        $msgacceuil=new msgaccueil();
        $msgacceuil->titre="";
        $msgacceuil->contenu="";
        $msgacceuil->save();
        return redirect('/admin/accueil');
    }
    public function saveIndex()
    {
        $index = new Index();
        $index->id = 1;
        $index->titre = $_POST['titre'];
        $index->description = $_POST['description'];
        $index->titreRubrique1 = $_POST['titreR1'];
        $index->paragrapheRubrique1 = $_POST['paragrapheR1'];
        $index->lienRubrique1 = $_POST['lienR1'];
        $index->titreRubrique2 = $_POST['titreR2'];
        $index->paragrapheRubrique2 = $_POST['paragrapheR2'];
        $index->lienRubrique2 = $_POST['lienR2'];
        $index->titreRubrique3 = $_POST['titreR3'];
        $index->paragrapheRubrique3 = $_POST['paragrapheR3'];
        $index->lienRubrique3 = $_POST['lienR3'];
        $j = 1;
        Index::query()->delete();
        $index->save();
        $index->latest()->first();
        if ($_FILES["indexphotos"]["name"][0] != "") {
            $photo = Images_Index::latest('nom')->first();
            if ($photo) {
                $lastPhotoName = $photo->nom;
                $ind = explode('.', $lastPhotoName);
                $lastPhotoIndex = $ind[0] + 1;
            } else
                $lastPhotoIndex = 1;
            for ($i = 0; $i < count($_FILES["indexphotos"]["name"]); $i++) {
                $info = pathinfo($_FILES["indexphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$lastPhotoIndex." . $ext;
                $lastPhotoIndex++;
                $target0 = "img/hero/imageIndex" . $newname;
                move_uploaded_file($_FILES["indexphotos"]["tmp_name"][$i], $target0);
                $imageIndex = new Images_Index();
                $imageIndex->nom = $newname;
                $imageIndex->indx = 1;
                $imageIndex->save();
            }
        }
        if (isset($_POST['deleteimg'])) {
            foreach ($_POST['deleteimg'] as $img) {
                Images_index::where('nom', $img)->delete();
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/hero/imageIndex' . $img;
                unlink($file_path);
            }
        }
        return redirect('/admin/accueil');
    }
    // public function modificationIndex()
    // {
    //     if (isset($_POST['deleteimg'])) {
    //         foreach ($_POST['deleteimg'] as $img) {
    //             $index_id = $img->
    //             Images_index::where('nom', $img)->delete();
    //             unlink(substr($img, 1)); //unlink supprime le fichier du stockage
    //         }
    //     }
    //     $j = 0;
    //     if ($_FILES["herophotos"]["name"][0] != "") {
    //         for ($i = 0; $i < count($_FILES["herophotos"]["name"]); $i++) {
    //             $info = pathinfo($_FILES["herophotos"]["name"][$i]);
    //             $ext = $info["extension"];
    //             $newname = "$j." . $ext;
    //             $target0 = "img/hero/imageIndex" . $newname;
    //             move_uploaded_file($_FILES["herophotos"]["tmp_name"][$i], $target0);
    //             $j++;
    //             $imageIndex = new Images_Index();
    //             $imageIndex->nom = "imageIndex" . $newname;
    //             $imageIndex->indx = $index->id();
    //             $imageIndex->save();
    //         }
    //     }
    //     return view("admin-index");
    // }
    // public function suppr($nom)
    // {
    //     if (isset($_POST['deleteimg'])) {
    //         foreach ($_POST['deleteimg'] as $img) {
    //             Assoimage::where('url', $img)->delete();
    //             unlink(substr($img, 1)); //unlink supprime le fichier du stockage
    //         }
    //     }
    //     $j = -1;
    //     $photos = Assoimage::where('nom', 'heroImg')->get();
    //     foreach ($photos as $photo) {
    //         $photo = explode("/", $photo->url)[2];
    //         $photo = pathinfo($photo, PATHINFO_FILENAME);
    //         if ($j < substr($photo, strlen('heroImg'))) $j = substr($photo, strlen('heroImg'));
    //     }
    //     $j++;
    //     if ($_FILES["herophotos"]["name"][0] != "") {
    //         for ($i = 0; $i < count($_FILES["herophotos"]["name"]); $i++) {
    //             $info = pathinfo($_FILES["herophotos"]["name"][$i]);
    //             $ext = $info["extension"];
    //             $newname = "$j." . $ext;
    //             $target = "img/hero/$nom" . $newname;
    //             move_uploaded_file($_FILES["herophotos"]["tmp_name"][$i], $target);
    //             $j++;
    //             $assoimage = new Assoimage();
    //             $assoimage->nom = $nom;
    //             $assoimage->categorie = "hero";
    //             $assoimage->url = $target;
    //             $assoimage->save();
    //         }
    //     }
    //     return redirect("/admin/index/");
    // }

    public function affichageIndex()
    {
        $index = Index::latest()->first();
        $photos = Images_index::where('indx', 1)->get();
        $msgaccueil=msgaccueil::latest()->first();
        return view('index', ['index' => $index, 'photos' => $photos,'msgaccueil'=>$msgaccueil]);
    }

    public function affichageIndMod()
    {
        $index = Index::latest()->first();
        $photos = Images_index::where('indx', 1)->oldest()->get();
        $msgaccueil=msgaccueil::latest()->first();
        return view('admin-index', ['index' => $index, 'photos' => $photos,'msgaccueil'=>$msgaccueil]);
    }
}
