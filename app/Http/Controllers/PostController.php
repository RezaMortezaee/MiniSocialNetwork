<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

    public function postEditPost(Request $request)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body],200);
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|max:100'
        ]);
        $user = Auth::user();
        $user->first_name=$request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'].'-'.$user->id.'.jpg';

        if($file) {
            Storage::disk('local')->put($filename,\File::get($file));
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get('filename');
        return new Response($file,200);
    }
}
