<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('permission:post_view')->only(['index', 'show']);
        $this->middleware('permission:post_create')->only(['create', 'store']);
        $this->middleware('permission:post_update')->only(['edit', 'update']);
        $this->middleware('permission:post_delete')->only('destroy');
    }

    public function index()
    {

        $posts=Post::query()->paginate(10);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::query()->whereHas('roles', function($query){
            $query->where('name', 'Author');
        })->get();

        return view('post.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     try {
         //  dd($request);
         $data=$request->all();
         Post::query()->create($data);

         return redirect()->route('posts.index')->with('success', 'Registro salvo com sucesso!');
     } catch (Exception $e) {
        dd($e);
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $users=User::query()->whereHas('roles', function($query){
            $query->where('name', 'Author');
        })->get();
        return view('post.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
