<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use App\Models\Post;
class postController extends Controller
{
    public function post(Request $request){
        $request->validate([
            'title' => 'required',
            'body'=>'required',
            'image'=>'image'
        ]);
        $post = new Post;
        $post->username = $request['username'];
        $post->title = $request['title'];
        $post->like=0;
        $post->slug = Str::slug($request['title']);
        if($request->file('image')){
            $post->image = $request->file('image')->store('postImage');
        }
        $post->excerpt = Str::limit($request['body'], 200);
        $post->body = $request['body'];
        $post->save();
        return redirect('/');
    }
    public function sharedPost(){
        $posts = Post::latest();
        if (request('id')){
            $posts->where('id','like','%'.request('id').'%');
        }
        return view('features/sharedPost', [
            "title" => request('slug'),
            "posts" => $posts->get()
        ]);
    }
    public function updateComment(Request $request){
        $update = Post::find($request->id);
        $commentator = auth()->user()->name;
        $userandcomment = 'From '.$commentator.' , comment : '.$request['comment'];
        if ($update->comment == null) {
            $update->comment = [$userandcomment];
        } else {
            $update->comment = array_merge($update->comment,[$userandcomment]);
        };
        $update->push();
        return back();
    }
    public function like(Request $request){
        $update = Post::find($request->id);
        $update->like = $request->like;
        $update->push();
        return back();
    }

    public function delete(Request $request){
        Post::destroy($request->id);
        return back()->with('deleteSuccess','Your post already deleted!');

    }

}
