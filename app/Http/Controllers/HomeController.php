<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateBlogPost;
use App\Http\Requests\DeleteBlogPost;
use App\User, App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateBlogPost;

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
        $posts = Post::all();
        return view('home',['posts' => $posts]);
    }

    public function create(CreateBlogPost $request)
    {
        $validatedInput = $request->validated();

        $post = new Post();
        $post->postTitle = $validatedInput['postTitle'];
        $post->postText = $validatedInput['postText'];
        $post->username = $validatedInput['username'];

        $post->save([$post]);
        return redirect('home');
    }

    public function update(UpdateBlogPost $request)
    {
        $validatedInput = $request->validated();

        $post = Post::find($validatedInput['id']);

        $post->postTitle = $validatedInput['postTitle'];
        $post->postText = $validatedInput['postText'];

        $post->save([$post]);
        return redirect('home');
    }

    public function delete(DeleteBlogPost $request)
    {
        $validatedInput = $request->validated();

        $deletedPost = Post::find($validatedInput['id'])->delete();

        return redirect('home');
    }
}
