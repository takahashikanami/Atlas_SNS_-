<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function profile(Request $request){
        if($request->isMethod('post')){
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $bio = $request->input('bio');
            $image = $request->file('image');

            $data = $request->input();
            $request->validate([
              'username' => 'required|string|max:12|min:2',
              'bio' => 'max:150',
              'mail' => 'required|string|email|max:40|min:5|unique:users,mail,'.$request->id.',id',
              'password' => 'required|string|min:4||confirmed',
            ]);

            User::where('id', Auth::id())->update(['mail' => $mail]);
            User::where('id', Auth::id())->update(['password' => bcrypt($password)]);


            if ($image != null){
                $request->validate([
                    'image' => 'file|image|mimes:gif,png,jpg,bmp,svg|max:2048'
                ]);
                $image_path = $image->store('public/images');
                User::where('id', Auth::id())->update(['images' =>basename($image_path)]);
            }

            User::where('id', Auth::id())->update([
                'username' => $username,
                'bio' => $bio,
            ]);
            return redirect('profile');
        } else {
            $user = Auth::user();
            return view('users.profile',['user' => $user]);
            }
    }
    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if (!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->get();
            $request->session()->put('search', $keyword);
        }
        else {
            $users = User::all();
            \Session::forget('search');
        }

        return view('users.search',['users' => $users]);
    }

    public function otherProfile($id){
        $user = User::where('id',$id)->first();
        $post = Post::with('user')->where('user_id',$id)->get();

        return view('users.otherProfile',['user' => $user, 'post' => $post]);
    }

}
