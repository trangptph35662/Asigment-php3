<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::query()->with('children')->latest('id')->limit(2)->get()  ;
        $postPopular= Post::query()->where('is_popular', 1)->take(2)->get() ;
        $postNew= Post::query()->where('is_new', 1)->latest('id')->limit(6)->get() ;
        $postTrending = Post::query()->where('is_trending', 1)->get() ;
        return view('client.layouts.index', compact('categories', 'postPopular', 'postTrending', 'postNew'));
    }

    public function post_showDetail(string $id){
        $post = Post::query()->where('id', $id)->first() ;
        // dd($post) ;
        $categories = Category::query()->with('children')->latest('id')->limit(2)->get()  ;
        
        return view('client.posts.showDetail', compact('categories', 'post'));
    }
    
    public function showCategory(string $id){
        $categories = Category::query()->with('children')->latest('id')->limit(2)->get()  ;
        $category = Category::query()->where('id', $id)->get() ;
        $posts = Post::query()->where('category_id', $id)->get() ;

        return view('client.posts.showCategory', compact('categories', 'category', 'posts')) ;
    }
}
