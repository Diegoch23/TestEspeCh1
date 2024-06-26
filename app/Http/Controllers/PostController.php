<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post= new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        if($request->hasFile('image')){
            $flile= $request->file('image');
            $path= Storage::putFile('public/images/' , $request->file('image'));
            $nuevo_path=str_replace('public/','',$path);
            $post->image_url=$nuevo_path;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function view($post)
    {
        //
        $post=Post::find($post);
        return view('view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image_url) {
            Storage::delete('public/' . str_replace('storage/', '', $post->image_url));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post eliminado con éxito');
    }
}
