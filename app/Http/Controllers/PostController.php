<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Post::query()->with(['category', 'user', 'tags'])->get();
        // dd($data) ;
        return view('admin.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        $user = User::query()->pluck('name', 'id')->all();
        // dd($categories) ;
        return view('admin.post.create', compact('categories', 'tags', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except(['img_thumb', 'tags']);
        $productTags = $request->tags;
        // dd($productTags) ;
        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = Storage::put('post', $request->file('img_thumb'));
        }


        $data = Post::query()->create($data);
        $data->tags()->attach($productTags);
        return redirect()->route('post.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $categories = Category::query()->get()->pluck('name', 'id');
        return view('admin.post.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        $user = User::query()->pluck('name', 'id')->all();
        return view('admin.post.edit', compact('post', 'categories', 'tags', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        Post::find($post->id);
        $data = $request->except('img_thumb');
        $dataProductTags = $request->tags;
        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = Storage::put('post', $request->file('img_thumb'));
        }

        $image = $post->img_thumb;
        $post->update($data);
        $post->tags()->sync($dataProductTags);
        if ($image && Storage::exists($image) && $request->hasFile('img_thumb')) {
            Storage::delete($image);
        }
        return back()->with('success', 'Cập nhập mới thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        // Post::findOrFail($post->id);
        $post->tags()->sync([]);
        $post->delete();
        $post->img_thumb;
        if ($post->img_thumb && Storage::exists($post->img_thumb)) {
            Storage::delete($post->img_thumb);
        }
        return back()->with('success', 'Xoá thành công');
    }
}
