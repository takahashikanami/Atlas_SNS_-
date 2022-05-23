<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function follow($id)
    {
        $follow = Auth::id();
        Follow::create([
            'following_id' => $follow,
            'followed_id' => $id
        ]);
        return back();
    }

    public function unfollow($id)
    {
        $follow = Auth::id();
        Follow::where('following_id',$follow)->where('followed_id',$id)->delete();

            return back();

    }

    public function followList(){
        // get all posts
        $id = Auth::id();
        $post = Post::with('user')->get();
        $user = User::get();

        return view('follows.followList',['post' =>$post, 'user' =>$user]);
    }
    public function followerList(){
        // get all posts
        $id = Auth::id();
        $post = Post::with('user')->get();
        $user = User::get();

        return view('follows.followerList',['post' =>$post, 'user' =>$user]);
    }

}
