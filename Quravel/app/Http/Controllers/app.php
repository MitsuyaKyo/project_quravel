<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class app extends Controller
{
    public function home(){
        $posts = Post::latest();
        if (request('search')){
            $posts->where('title','like','%'.request('search').'%');
        }
        return view('features/home', [
            "title" => "home",
            "posts" => $posts->get()
        ]);

    }
    public function login(){
        return view('features/login', [
            "title" => "login"
        ]);

    }
    public function register(){
        return view('features/register', [
            "title" => "register"
        ]);

    }
    public function deskripsi(){
        return view('features/deskripsi', [
            "title" => "touristattraction"
        ]);

    }
    public function profile(){
        return view('features.profile',[
            "title"=>"profile"
        ]);
    }
    public function post(){
        return view('features.post',[
            "title"=>"post"
        ]);
    }
    public function myPost(){
        return view('features.mypost',[
            "title" =>"mypost",
            "posts" => Post::where('username', auth()->user()->name)->get(),
        ]);
    }
}
