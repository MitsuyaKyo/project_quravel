@extends('layouts.main')
@section('container')

<section class="jumbotron ">
    <div class="row">
        <div class="col-3">
            <div class="c">
                <h3 class="mt-4">Recomendation</h3>
                <form action="/" class="d-flex mt-3">
                    <input type="hidden" name="search" value="gedung sate" >
                    <img src="{{ url('images/gedungsate.jpg') }}" alt="gedungsate" style="width:50px; height:30px ">
                    <button class="btn btn-link" style="font-size:15px; color:black"type="submit">Gedung Sate</button>
                </form>

                <form action="/" class="d-flex">
                    <input type="hidden" name="search" value="semeti" >
                    <img src="{{ url('images/semeti.jpg') }}" alt="semeti" style="width:50px; height:30px ">
                    <button class="btn btn-link" style="font-size:15px; color:black"type="submit">Semeti</button>
                </form>
                <form action="/" class="d-flex">
                    <input type="hidden" name="search" value="borobudur" >
                    <img src="{{ url('images/borobudur.jpg') }}" alt="borobudur" style="width:50px; height:30px ">
                    <button class="btn btn-link" style="font-size:15px; color:black"type="submit">Gedung Sate</button>
                </form>
            </div>
        </div>
        <div class="col b">
            @foreach ($posts as $post )
                <div style="border-bottom: 2px solid green">
                    <div class="col-4 "> <img src="{{ url('images/Profile.png') }}" alt="Profile" style="width:50px; height:50px "></div>
                    <div class="col-6"> <pre style="width:600px "> {{  $post["username"] }}       {{ $post["created_at"] }}</pre>   </div>
                    <h2 style="color:green"> +{{ $post["like"] }}</h2>
                    <h2>{{ $post["title"] }}</h2>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
                    @endif
                    <p style="width:600px">{!! $post["excerpt"] !!}</p>
                    <form action="/sharedPost" method="get">
                        @csrf
                        <input class="form-control me-1" type="hidden"
                            name="id"aria-label="id" value="{{ $post->id }}" >
                        <input class="form-control me-1" type="hidden"
                            name="slug"aria-label="id" value="{{ $post->slug }}" >
                        <button class="btn btn-link" style="color:green">
                            <pre>Show this thread! <img src="{{ url('images/comment.png') }}" alt="comment" style="width:20px; height:20px "> Comment <img src="{{ url('images/like.png') }}" alt="like" style="width:20px; height:20px "> Like </pre>
                        </button>
                    </form>
                </div><br>
            @endforeach
        </div>
    </div>
</section>

@endsection
<link rel="stylesheet" type="text/css" href="css/home.css">
