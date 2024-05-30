<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;


class ArticlesController extends Controller
{
    function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            abort(404);
        }
        return view('article', ['article' => $article]);
    }
    function showListe(){
        $articles = Article::all();
        return view('admin-articles', ['articles' => $articles]);
    }
    function showListe2(){
        $articles = Article::all()->sortBy('updated_at');
        return view('articles', ['articles' => $articles]);
    }
    function showEdit($id){
        $article = Article::find($id);
        if (!$article) {
            abort(404);
        }
        return view('admin-article', ['article' => $article]);
    }
    function store(Request $request){
        if(isset($request->id)){
            $article = Article::find($request->id);
        }else{
            $article = new Article();
        }
        $article->titre = $request->input('titre');
        $article->contenu = $request->contenu;
        if(isset($request->image)){
            $image=$_FILES['image']['name'];
            $info = pathinfo($image);
            $ext = $info["extension"];
            $target = "img/articles/" . $request->input('titre') .".". $ext;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
            $article->lienimage = $target;
        }else{
            $article->lienimage = "";
        }
        $article->save();
        return redirect('/admin/articles');
    }
    function delete($id){
        $article = Article::find($id);
        if($article->lienimage != null){
            unlink($article->lienimage);
        }
        $article->delete();
        return redirect('/admin/articles');
    }

    function deleteimg($id){
        $article = Article::find($id);
        if($article->lienimage != null){
            unlink($article->lienimage);
        }
        return redirect('/admin/article'.$id);
    }
}