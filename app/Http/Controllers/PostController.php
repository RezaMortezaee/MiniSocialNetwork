<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getDashboard()
    {
        $post = Post::OrderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$post]);
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request,[
            'body'=>'required|max:1000'
        ]); 
        $post = new Post();
        $post->body = $request['body'];
        $message='There was an error';
       if($request->user()->posts()->save($post)) {
           $message='Post Successfully Created!';
       };
        return redirect()->route('dashboard')->with(['message'=> $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        if(Auth::user()!= $post->user){
            return redirect()->back();
        }
        /* This is also available 
           $post = find($post_id)->first(); 
        */
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Successfully Deleted!']);
    }
    public function getLogOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
