@extends('layouts.main')
@section('container')
<br><br><br><br><br>
@foreach ($posts as $post )
    <div>
        <div class="col-4 "> <img src="{{ url('images/Profile.png') }}" alt="Profile" style="width:50px; height:50px "></div>
        <div class="col-6"> <pre style="width:600px "> {{  $post["username"] }}       {{ $post["created_at"] }}</pre>
            <form action="/like" method="post">
                @csrf
                <input type="hidden" name ="id" value="{{ $post->id }}">
                <img src="{{ url('images/like.png') }}" alt="like" style="width:20px; height:20px "><button type="submit" class="btn btn-link" style="color:green; font-size:25px">Like</button>
            </form>
        <h2 style="color:green"> +{{ $post["like"] }}</h2>
        </div>

        <h2>{{ $post["title"] }}</h2>
        @if($post->image)
            <div style="width:1200px"><img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3"></div>
        @endif
        <p>{!! $post["body"] !!}</p>

        <h5><img src="{{ url('images/comment.png') }}" alt="comment" style="width:40px; height:40px ">Comment</h5>
        @if ($post["comment"] != null)
            @for ($i =0; $i < sizeOf($post["comment"]); $i++)
            <div>{{ $post["comment"][$i] }}</div>
             @endfor
        @else
            <p>Belum ada Komentar</p>
        @endif

        <br>
        <br>
        <form action="/comment" method="post">
            @csrf
            <input type="hidden" name ="id" value="{{ $post->id }}">
            <label for="comment" class="form-label"><h3>Comment</h3></label><br>
            <textarea name="comment" id="comment" cols="150" rows="10"></textarea>
            <button type="submit" class="btn btn-success mt-4" style="padding-left: 2.5rem; padding-right: 2.5rem;">Comment</button>
        </form>

    </div>
@endforeach

@endsection
