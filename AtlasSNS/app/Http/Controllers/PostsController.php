<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $post = Post::get();
        return view('posts.index',['user'=>$user, 'post'=>$post]);
    }

    public function post(Request $request){
        $post = new Post;
        $form = $request->all();
        $id = Auth::id();

        Post::create([
            'user_id' => $id,
            'post' => $form['newPost'],
        ]);
        return redirect('/top');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->delete();
        return redirect('/top');
    }

}
