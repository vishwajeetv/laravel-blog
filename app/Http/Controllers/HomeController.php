<?php

namespace App\Http\Controllers;
use App\User, App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        Log::info($user);
        $posts = Post::all();
        return view('home',['posts' => $posts]);
    }
}
