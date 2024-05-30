<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogs;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    function affichage(){
        $blogs = Blogs::all();
        return view('admin-blogs', ['blogs' => $blogs]);
    }
    function addBlog(Request $request){
        $blogs = new Blogs();
        if($request->hasFile('blog')){
            if($request->file('blog')->getClientOriginalExtension()!="pdf"){
                return redirect("/admin/blogs?error=1");
            }
        }
        $file = Storage::putFileAs('blogs', $request->file('blog'), $request->file('blog')->getClientOriginalName());
        $blogs->url=$file;
        $blogs->save();
        return redirect('/admin/blogs');
    }
    function deleteBlog(Request $request){
        $blogs = Blogs::find($request->id);
        Storage::delete($blogs->url);
        $blogs->delete();
        return redirect('/admin/blogs');
    }
}
