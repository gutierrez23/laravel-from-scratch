<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts', [
            'posts'         => Post::latest('published_at')->get(),
            'categories'    => Category::all()
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function categories(Category $category){
        return view('posts', [
            'posts'             => $category->posts,
            'currentCategory'   => $category,
            'categories'        => Category::all()
        ]);
    }

    public function authors(User $author){
        return view('posts', [
            'posts'         => $author->posts->load(['category', 'author']),
            'categories'    => Category::all()
        ]);
    }
}
