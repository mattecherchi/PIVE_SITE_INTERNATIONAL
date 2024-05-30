<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidature;
use App\VariableGlobal;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Filieres;
use App\Specialites; 
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CandidatureExport;


class CandidatureController extends Controller
{
    public function show() 
    {
    $candidature = Candidature::find(session("mail"));
    $datelimite = VariableGlobal::find("1");
    $specialites=Specialites::all()->groupBy('nom_filiere');
    $ajouts=Schema::getColumnListing('candidatures_ajout');
    $ajoutsO=[];
    foreach($ajouts as $ajout){
        $app=app();
        $ajoutO=$app->make('stdClass');
        $ajoutO->nom=$ajout;
        $type=Schema::getColumnType('candidatures_ajout',$ajout);
        $query=DB::select("SELECT ".$ajout." FROM candidatures_ajout WHERE email=?",[session("mail")]);
        if(count($query)>0){
            $ajoutO->value=$query[0]->$ajout;
        }else{
            $ajoutO->value="";
        }
        switch($type){
            case "integer":
                $ajoutO->type="number";
                break;
            case "string":
                $ajoutO->type="text";
                break;
            case "boolean":
                $ajoutO->type="checkbox";
                break;
            case "date":
                $ajoutO->type="date";
                break;
            default:
                $ajoutO->type="text";
                break;
        }
        array_push($ajoutsO,$ajoutO);
    }
        return view('profil-candidature', ['candidature' => $candidature, 'datelimite' => $datelimite, 'specialites' => $specialites, 'ajouts' => $ajoutsO]);
    }
    function showListe(){
        $datelimite = VariableGlobal::find("1");
        $candidaturesM = Candidature::where('demande_unblocked','=',1)->get();
        $candidaturesN = Candidature::where('demande_unblocked','=',0)->get();
        return view('admin-fiches', ['candidaturesM' => $candidaturesM,'candidaturesN'=>$candidaturesN, 'datelimite' => $datelimite]);
    }

    public function showAdmin($email) 
    {
        $candidature = Candidature::where('email', $email)->first();
        $specialites=Specialites::all()->groupBy('nom_filiere');
        $ajouts=Schema::getColumnListing('candidatures_ajout');
        $ajoutsO=[];
        foreach($ajouts as $ajout){
            $app=app();
            $ajoutO=$app->make('stdClass');
            $ajoutO->nom=$ajout;
            $query=DB::select("SELECT ".$ajout." FROM candidatures_ajout WHERE email=?",[$email]);
            if(count($query)>0){
                $ajoutO->value=$query[0]->$ajout;
            }else{
                $ajoutO->value="";
            }
            $type=Schema::getColumnType('candidatures_ajout',$ajout);
            switch($type){
                case "integer":
                    $ajoutO->type="number";
                    break;
                case "string":
                    $ajoutO->type="text";
                    break;
                case "boolean":
                    $ajoutO->type="checkbox";
                    break;
                case "date":
                    $ajoutO->type="date";
                    break;
                default:
                    $ajoutO->type="text";
                    break;
            }
            array_push($ajoutsO,$ajoutO);
        }
        return view('admin-fiche', ['candidature' => $candidature,'specialites' => $specialites, 'ajouts' => $ajoutsO]);
    }

    public function store(Request $request) 
    {
        if(Candidature::find(session("mail"))) 
            $candidature = Candidature::find(session("mail"));
        else 
            $candidature = new Candidature();
        try{
            if($candidature->blocked!=true) {
                if(isset($request->ajout)){
                    $ajouts=Schema::getColumnListing('candidatures_ajout');
                    DB::delete('delete from candidatures_ajout where email=?',[session("mail")]);
                    DB::insert('insert into candidatures_ajout (email) values (?)', [session("mail")]);
                    for($i=0;$i<count($request->ajout);$i++){
                        DB::update('update candidatures_ajout set '.$ajouts[$i+1].'=? where email=?', [$request->ajout[$i],session("mail")]);
                    }
                }
                $candidature->email = session("mail");
                $candidature->prenom = $request->prenom;
                $candidature->nom = $request->nom;
                $candidature->date_naissance = $request->date_naissance;
                $candidature->nationalite = $request->nationalite;
                $candidature->adresse_fixe = $request->rue_adresse;
                $candidature->code_postal = $request->code_postal;
                $candidature->ville = $request->ville;
                if($request->tel_fixe) $candidature->tel_fixe = $request->tel_fixe;
                else $candidature->portable = $request->tel_portable;
                if($request->boursier=='Oui') $candidature->boursier = true;
                else $candidature->boursier = false;
                $candidature->region_origine = $request->region_origine;
                $candidature->annee_entree = $request->annee_entree;
                $candidature->annee_actuelle = $request->annee_actuelle;
                $candidature->diplome_choisi = $request->diplome;
                $candidature->specialisation = $request->parcours;
                $candidature->langue1 = $request->langues1;
                $candidature->annee_langue1 = $request->annee_langues1;
                if ($request->langues2) {
                    $candidature->langue2 = $request->langues2;
                    $candidature->annee_langue2 = $request->annee_langues2;
                    if ($request->langues3) {
                        $candidature->langue3 = $request->langues3;
                        $candidature->annee_langue3 = $request->annee_langues3;
                    }
                }
                $candidature->toeic = $request->toeic;
                $candidature->annee_toeic = $request->annee_toeic;
                if($request->deja_parti=='Oui') {
                    $candidature->deja_parti_erasmus = true;
                    $candidature->destination_erasmus = $request->dest_deja_parti;
                    $candidature->date_erasmus = $request->date_deja_parti;
                }
                else {
                    $candidature->deja_parti_erasmus = false;
                    $candidature->destination_erasmus = null;
                    $candidature->date_erasmus = null;
                }
                $candidature->choix1 = $request->choix1;
                $candidature->semestre_choix1 = $request->semestre_choix1;
                if($request->choix2) {
                    $candidature->choix2 = $request->choix2;
                    $candidature->semestre_choix2 = $request->semestre_choix2;
                    if($request->choix3) {
                        $candidature->choix3 = $request->choix3;
                        $candidature->semestre_choix3 = $request->semestre_choix3;
                    }
                }
                $candidature->signature = $request->signature;
                $candidature->blocked = true;
                $candidature->demande_unblocked = false;
            }
            else if($candidature->blocked==true) {
                $candidature->demande_unblocked = true;
                $candidature->message_unblocked = $request->message_unblocked;
            }
                $candidature->save();
        }
        catch(\Illuminate\Database\QueryException $e) { //
            return redirect('/profil/candidature?e=1');
        }
        return redirect('/profil/candidature');
    }

    public function storeAdmin(Request $request) 
    {
        if(isset($request->ajout)){
            $ajouts=Schema::getColumnListing('candidatures_ajout');
            DB::delete('delete from candidatures_ajout where email=?',[$request->email]);
            DB::insert('insert into candidatures_ajout (email) values (?)', [$request->email]);
            for($i=0;$i<count($request->ajout);$i++){
                DB::update('update candidatures_ajout set '.$ajouts[$i+1].'=? where email=?', [$request->ajout[$i],$request->email]);
            }
        }
        $candidature = Candidature::find($request->email);
        $candidature->prenom = $request->prenom;
        $candidature->nom = $request->nom;
        $candidature->date_naissance = $request->date_naissance;
        $candidature->nationalite = $request->nationalite;
        $candidature->adresse_fixe = $request->rue_adresse;
        $candidature->code_postal = $request->code_postal;
        $candidature->ville = $request->ville;
        if($request->tel_fixe) $candidature->tel_fixe = $request->tel_fixe;
        else $candidature->portable = $request->tel_portable;
        if($request->boursier=='Oui') $candidature->boursier = true;
        else $candidature->boursier = false;
        $candidature->region_origine = $request->region_origine;
        $candidature->annee_entree = $request->annee_entree;
        $candidature->annee_actuelle = $request->annee_actuelle;
        $candidature->diplome_choisi = $request->diplome;
        $candidature->specialisation = $request->parcours;
        $candidature->langue1 = $request->langues1;
        $candidature->annee_langue1 = $request->annee_langues1;
        if ($request->langues2) {
            $candidature->langue2 = $request->langues2;
            $candidature->annee_langue2 = $request->annee_langues2;
            if ($request->langues3) {
                $candidature->langue3 = $request->langues3;
                $candidature->annee_langue3 = $request->annee_langues3;
            }
        }
        $candidature->toeic = $request->toeic;
        $candidature->annee_toeic = $request->annee_toeic;
        if($request->deja_parti=='Oui') {
            $candidature->deja_parti_erasmus = true;
            $candidature->destination_erasmus = $request->dest_deja_parti;
            $candidature->date_erasmus = $request->date_deja_parti;
        }
        else {
            $candidature->deja_parti_erasmus = false;
            $candidature->destination_erasmus = null;
            $candidature->date_erasmus = null;
        }
        $candidature->choix1 = $request->choix1;
        $candidature->semestre_choix1 = $request->semestre_choix1;
        if($request->choix2) {
            $candidature->choix2 = $request->choix2;
            $candidature->semestre_choix2 = $request->semestre_choix2;
            if($request->choix3) {
                $candidature->choix3 = $request->choix3;
                $candidature->semestre_choix3 = $request->semestre_choix3;
            }
        }
        $candidature->signature = $request->signature;
        $candidature->save();
        return redirect("/admin/fiches");
    }

    public function bloquer(Request $request)
    {
        $email = $request->email;
        if(Candidature::find($email)) 
            $candidature = Candidature::find($email);
        else
            abort(404);
        $candidature->blocked = 1;
        $candidature->demande_unblocked = 0;
        $candidature->message_unblocked = null;
        $candidature->save();
        return redirect('/admin/fiches');
    }
    public function debloquer(Request $request){
        $email = $request->email;
        if(Candidature::find($email)) 
            $candidature = Candidature::find($email);
        else
            abort(404);
        $candidature->blocked = 0;
        $candidature->demande_unblocked = 0;
        $candidature->message_unblocked = null;
        $candidature->save();
        return redirect('/admin/fiches');
    }
    
    public function changerdatelimite(Request $request)
    {
        $datelimite=VariableGlobal::find("1");
        if($datelimite==null) $datelimite = new VariableGlobal();
        $datelimite->datelimite_candidature = $request->datelimite;
        $datelimite->save();
        return redirect('/admin/fiches');
    }
    public function deleteAll() 
    {
        Candidature::truncate();
        return redirect('/admin/fiches');
    }
    public function showEdit(){
        $columns=Schema::getColumnListing('candidatures_ajout');
        $filieres=Filieres::all();
        $specialites=Specialites::all();
        return view('admin-editfiche',['columns' => $columns, 'filieres' => $filieres, 'specialites' => $specialites]);
    }
    public function addSpe(Request $request){
        $specialite = new Specialites();
        $specialite->nom_spe = $request->nom;
        $specialite->nom_filiere = $request->filiere;
        $specialite->save();
        return redirect('/admin/editfiche');
    }
    public function deleteSpe(Request $request){
        $specialite = Specialites::find($request->nom);
        $specialite->delete();
        return redirect('/admin/editfiche');
    }
    public function addFiliere(Request $request){
        $filiere = new Filieres();
        $filiere->nom_filiere = $request->nom;
        $filiere->save();
        return redirect('/admin/editfiche');
    }
    public function deleteFiliere(Request $request){
        $filiere = Filieres::find($request->nom);
        $specialites=Specialites::where('nom_filiere',$request->nom)->get();
        foreach($specialites as $spe){
            $spe->delete();
        }
        $filiere->delete();
        return redirect('/admin/editfiche');
    }
    public function addColumn(Request $request)
    {
        if($request->type!="" && $request->nom!=""){
            $columns=Schema::getColumnListing('candidatures_ajout');
            foreach($columns as $column){
                if($column==str_replace(" ","_",$request->nom)){
                    return redirect('/admin/editfiche')->with('error','Cette colonne existe déjà');
                }
            }
            $GLOBALS['nom']=str_replace(" ","_",$request->nom);
            $GLOBALS['type']=$request->type;
            Schema::table('candidatures_ajout', function (Blueprint $table) {
                switch($GLOBALS['type']){
                    case "string":
                        $table->string($GLOBALS['nom'])->nullable();
                        break;
                    case "date":
                        $table->date($GLOBALS['nom'])->nullable();
                        break;
                    case "integer":
                        $table->integer($GLOBALS['nom'])->nullable();
                        break;
                    case "float":
                        $table->float($GLOBALS['nom'])->nullable();
                        break;
                }
            });
        }
        return redirect('/admin/editfiche');
    }
    function removeColumn(Request $request)
    {
        if($request->nom!=""){
            $GLOBALS['nom']=$request->nom;
            Schema::table('candidatures_ajout', function (Blueprint $table) {
                $table->dropColumn($GLOBALS['nom']);
            });
        }
        return redirect('/admin/editfiche');
    }
    public function exportExcel() {
        return Excel::download(new CandidatureExport, 'candidatures.xlsx');
    }
}