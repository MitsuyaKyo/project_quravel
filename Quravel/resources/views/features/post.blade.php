@extends('layouts.main')
@section('container')
<br><br><br><br><br>
<div class="rowd-flex align-items-center">
    <h1 class="text-center text-success" id="Tagline">Post and Question</h1>
    <h5 class="text-center text-success" id="Tagline">You can ask questions and share experiences here!</h5>
    <div class="col-md-6 mx-auto "></div>
</div>
<form method="post" action="/post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-lg text-success "
        id="username" name="username" value ="{{ auth()->user()->name }}" hidden >
    </div>
    <div class="form-group">
        <label for="title" class="form-label " >Title</label>
        <input type="text" class="form-control form-control-lg text-success @error('title') is-invalid @enderror"
        id="title" name="title" value ="{{ old('title') }}" required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label mt-2">Post Image</label>
        <input class="form-control form-control-lg text-success @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="body" class="form-label mt-2">Content</label>
        <input id="body" type="hidden" name="body">
        <trix-editor input="body" class="@error('body') is-invalid @enderror" value ="{{ old('body') }}"></trix-editor>
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success mt-4" style="padding-left: 2.5rem; padding-right: 2.5rem;">Post</button>
    </div>
</form>
@endsection
