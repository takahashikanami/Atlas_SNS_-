<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //authミドルウェアを使い、特定のルートやアクションを、認証済みユーザーだけがアクセスできるよう保護する
    public function __construct(){
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

    public function delete($id){
        \DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('/top');
    }
    public function update(Request $request){
        $form = $request->get('text');
        $id = $request->get('id');
        Post::where('id',$id)->update(['post' => $form]);

        return redirect('/top');
    }
}
