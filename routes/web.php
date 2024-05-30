<?php

use App\Candidature;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FichiersController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Routes publiques
Route::get('/', [IndexController::class,'affichageIndex']); //Page d'accueil
Route::get('/destinations', [DestinationController::class,'affichageDestinations']); //Page des destinations
Route::get('storage/blogs/{blog}', function ($blog) { //Affichage des blogs
    $file = Storage::disk('local')->get('blogs/'.$blog);
    return response($file, 200)->header('Content-Type', 'application/pdf');
});
Route::get('/auth/login', [AuthController::class,"login"]); //Page de connexion
Route::get('/auth/logout', [AuthController::class,"logout"]); //Page de déconnexion

//Routes admin
Route::get('/admin', function () {
    return view('admin');
})->middleware('editeur');
    //Destinations
    Route::get('/admin/gestion', function () { //Page de gestion des destinations
        return view('admin-gestion');
    })->middleware('editeur');
    Route::get('/admin/creation', function () { //page du formulaire de création destination
        return view('admin-creation');
    })->middleware('editeur');
    Route::post('admin/creation', [DestinationController::class,'nouvelleDestination'])->middleware('editeur'); //création de la destination
    Route::delete('/admin/suppression', [DestinationController::class,'suppDestination'])->middleware('editeur'); //suppression de la destination
    Route::get("/admin/modification/{nom}", [DestinationController::class,"affichageEdition"])->middleware('editeur'); //page de modification de la destination
    Route::post("/admin/modification/{nom}", [DestinationController::class,'editDestination'])->middleware('editeur'); //modification de la destination
    //Candidatures
    Route::get('/admin/fiches', [CandidatureController::class,'showListe'])->middleware('admin'); //page des candidatures
    Route::post('/admin/fiches/changerdatelimite', [CandidatureController::class,'changerdatelimite'])->middleware('admin'); //changer la date limite des candidatures
    Route::post('/admin/fiches/exportExcel', [CandidatureController::class,'exportExcel'])->middleware('admin'); //export des candidatures
    Route::post('/admin/fiches/block', [CandidatureController::class,'bloquer'])->middleware('admin'); //blocage de la candidature
    Route::post('/admin/fiches/unblock', [CandidatureController::class,'debloquer'])->middleware('admin'); //déblocage de la candidature
    Route::post('/admin/fiches/mail', [CandidatureController::class,'mail'])->middleware('admin'); //envoi du mail à un élève
    Route::delete('/admin/fiches', [CandidatureController::class,'deleteAll'])->middleware('admin'); //suppression de toutes les candidatures
    Route::get("/admin/fiche/{email}", [CandidatureController::class,"showAdmin"])->middleware('admin'); //affichage de la fiche d'un élève
    Route::post('/admin/fiche/{email}', [CandidatureController::class,"storeAdmin"])->middleware('admin'); //enregistrement de la fiche d'un élève

    //Edition de la fiche candidature
    Route::get('/admin/editfiche', [CandidatureController::class,'showEdit'])->middleware('admin'); //page d'édition de la fiche candidature
    Route::post('/admin/editfiche', [CandidatureController::class,'addColumn'])->middleware('admin'); //modification de la fiche candidature
    Route::delete('/admin/editfiche', [CandidatureController::class,'removeColumn'])->middleware('admin'); //modification de la fiche candidature
    //Utilisateurs
    Route::get('/admin/utilisateurs', [UserController::class,'liste'])->middleware('admin'); //liste des utilisateurs
    Route::delete('/admin/utilisateurs/admin', [UserController::class,'deleteAdmin'])->middleware('admin'); //suppression d'un admin
    Route::post('/admin/utilisateurs/admin', [UserController::class,'addAdmin'])->middleware('admin'); //ajout d'un admin
    Route::delete('/admin/utilisateurs/editeur', [UserController::class,'deleteEditeur'])->middleware('admin'); //suppression d'un editeur
    Route::post('/admin/utilisateurs/editeur', [UserController::class,'addEditeur'])->middleware('admin'); //ajout d'un editeur
    //Filieres et spécialités
    Route::post('/admin/filiere', [CandidatureController::class,'addFiliere'])->middleware('admin'); //ajout d'une filiere
    Route::delete('/admin/filiere', [CandidatureController::class,'deleteFiliere'])->middleware('admin'); //suppression d'une filiere
    Route::post('/admin/specialite', [CandidatureController::class,'addSpe'])->middleware('admin'); //ajout d'une spécialité
    Route::delete('/admin/specialite', [CandidatureController::class,'deleteSpe'])->middleware('admin'); //suppression d'une spécialité
    //Fichiers
    Route::get('/admin/fichiers', [FichiersController::class, 'showadmin'])->middleware('admin'); //liste des fichiers d'élèves
    Route::delete('/admin/fichiers', [FichiersController::class, 'delete'])->middleware('admin'); //liste des fichiers d'élèves
    //Articles
    Route::get('/admin/articles', [ArticlesController::class, 'showListe'])->middleware('editeur'); //liste des articles
    Route::get('/admin/nouvelarticle', function(){ //page du formulaire d'ajout d'article
        return view('admin-article');
    })->middleware('editeur');
    Route::post('/admin/nouvelarticle', [ArticlesController::class, 'store'])->middleware('editeur'); //ajout d'un article
    Route::get('/admin/article/{id}', [ArticlesController::class, 'showEdit'])->middleware('editeur'); //page du formulaire d'édition d'article
    Route::post('/admin/article/{id}', [ArticlesController::class, 'store'])->middleware('editeur'); //édition d'un article
    Route::delete('/admin/article/{id}', [ArticlesController::class, 'delete'])->middleware('editeur'); //suppression d'un article
    //Blogs
    Route::get('/admin/blogs', [BlogsController::class,'affichage'])->middleware('editeur'); //liste des blogs
    Route::post('/admin/blogs', [BlogsController::class,'addBlog'])->middleware('editeur');   //ajout d'un blog
    Route::delete('/admin/blogs', [BlogsController::class,'deleteBlog'])->middleware('editeur');  //suppression d'un blog
    //Accueil
    Route::get('/admin/accueil/', [IndexController::class,'affichageIndMod'])->middleware('editeur'); //page de modification de l'accueil
    Route::post('/admin/accueil/', [IndexController::class,'saveIndex'])->middleware('editeur'); //enregistrement de l'accueil

    Route::post('/admin/msgaccueil', [IndexController::class, 'savemsgaccueil'])->middleware('editeur'); //enregistrement du message d'accueil
    Route::delete('/admin/msgaccueil', [IndexController::class, 'removemsgaccueil'])->middleware('editeur'); //suppression du message d'accueil
//Routes élèves polytech
    //Articles (ne doivent pas être accessible aux utilisateurs non connectés)
    Route::get("/articles", [ArticlesController::class, "showListe2"])->middleware('polytech'); //liste des articles
    Route::get("/article/{id}", [ArticlesController::class, "show"])->middleware('polytech'); //affichage d'un article
    //Destinations (ne doivent pas être accessible aux utilisateurs non connectés)
    Route::get("/destination/{nom}", [DestinationController::class,"affichageDestination"])->middleware('polytech'); //affichage d'une destination
    //Profil
    Route::get('/profil', function () {
        return view('profil');
    })->middleware('polytech');
        //Candidature
        Route::get('/profil/candidature', [CandidatureController::class,'show'])->middleware('polytech'); //affichage de la candidature
        Route::post('/profil/candidature', [CandidatureController::class, 'store'])->middleware('polytech'); //enregistrement de la candidature
        //Fichiers
        Route::get('/profil/fichiers', [FichiersController::class, 'show'])->middleware('polytech'); //liste des fichiers d'élèves
        Route::post('/profil/fichiers', [FichiersController::class, 'store'])->middleware('polytech'); //enregistrement d'un fichier
        Route::delete('/profil/fichiers', [FichiersController::class, 'delete'])->middleware('polytech'); //suppression d'un fichier
        Route::get('/storage/etu/{uid}/{filename}', function ($uid,$filename) { //affichage d'un fichier étudiant
            $file = Storage::disk('local')->get('etu/'.$uid.'/'.$filename);
            $ext=pathinfo($filename, PATHINFO_EXTENSION);
            return response($file, 200)->header('Content-Type', 'application/'.$ext);
        })->middleware('filesecu:{uid}');
        //CV
        Route::get('/profil/cv', function () { //page du générateur de CV
            return view('profil-cv');
        })->middleware('polytech');