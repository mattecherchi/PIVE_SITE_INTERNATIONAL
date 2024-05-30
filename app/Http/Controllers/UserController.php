<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Editeur;

class UserController extends Controller
{
    public function liste(){
        $admins=Admin::all();
        $editeurs=Editeur::all();
        return view('admin-utilisateurs',['admins'=>$admins,'editeurs'=>$editeurs]);
    }
    //fonction add pour ajouter un admin par uid s'il ne l'est pas déjà
    public function addAdmin(Request $request){
        $uid=$request->uid;
        $admins=Admin::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==$uid) $isAdmin=true;
        }
        if(!$isAdmin){
            Admin::create(['uid'=>$uid]);
        }
        return redirect('/admin/utilisateurs');
    }
    //fonction delete pour supprimer un admin par uid
    public function deleteAdmin(Request $request){
        $uid=$request->uid;
        $admins=Admin::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==$uid) $isAdmin=true;
        }
        if($isAdmin){
            Admin::where('uid',$uid)->delete();
        }
        return redirect('/admin/utilisateurs');
    }
    public function addEditeur(Request $request){
        $uid=$request->uid;
        $editeurs=Editeur::all();
        $isEditeur=false;
        foreach($editeurs as $editeur){
            if($editeur->uid==$uid) $isEditeur=true;
        }
        if(!$isEditeur){
            Editeur::create(['uid'=>$uid]);
        }
        return redirect('/admin/utilisateurs');
    }
    public function deleteEditeur(Request $request){
        $uid=$request->uid;
        $editeurs=Editeur::all();
        $isEditeur=false;
        foreach($editeurs as $editeur){
            if($editeur->uid==$uid) $isEditeur=true;
        }
        if($isEditeur){
            Editeur::where('uid',$uid)->delete();
        }
        return redirect('/admin/utilisateurs');
    }
}
