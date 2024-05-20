<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke(Request $request){
        $posts = Post::query()->paginate(10);
        return view('dashboard', compact('posts'));
    }
}
