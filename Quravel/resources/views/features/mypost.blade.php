@extends('layouts.main')
@section('container')
<br><br><br><br><br><br><br><br>
@if(Session::has('deleteSuccess'))
<div class="alert alert-success">
    {{ Session::get('deleteSuccess') }}
</div>
@endif
<h1 class="JudulLogin">My Post</h1>
<div class="table-responsive mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Published at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post )
            <tr>
                <td>{{ $post->title }}</td>
                <td>{!! $post->body !!}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <form action="/delete" method="post">
                        @csrf
                        <input type="hidden" value={{ $post->id }} name="id">
                        <button style="border: 0; background-color:white" onclick="return confirm('Are you sure ?')">
                            <img src="{{ url('images/delete.png') }}" alt="comment" style="width:40px; height:40px "></button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
    </table>
  </div>
@endsection
