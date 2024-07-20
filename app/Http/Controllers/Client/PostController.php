<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showDetail(Post $post){
        // dd($post) ;
        return view('client.posts.showDetail', compact('post'));
    }
}
