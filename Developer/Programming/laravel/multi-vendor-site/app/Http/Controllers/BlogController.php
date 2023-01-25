<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function newBlog(){
        return view('add_new_blog');

    }

    public function postBlog(Request $request){
        $incomingFields = $request->validate([
            'blog_title' => 'required',
            'short_title' => 'required',
            'detail'  => 'required',
            'image' => 'required',
            'hero_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
        ]);
        Blog::create($incomingFields);
        
        return view('list_blog_posts');
    }
}
