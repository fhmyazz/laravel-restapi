<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $data = Post::all();
        
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Post::find($id);
        
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $data = $request->all();
        $response = Post::create($data);
        
        return response()->json($response, 201);
    }

    // Route Model binding
    public function update(Request $request, Post $post){
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function delete($id){
        $post = Post::where('id', '=', $id)
                      ->first();
        $title = $post->title;

        $post->delete();
        return response()->json("Post $title has been deleted", 200);
    }
}
