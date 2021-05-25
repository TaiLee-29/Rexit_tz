@extends('layout')

@section('title', '   Post')

@section('content')
    <h1>New Post</h1>
    <br><br>
    <form  method="post"  enctype="multipart/form-data">
        @csrf
        @if($errors->has('title'))
            @foreach($errors->get("title") as $error)
            <div class="alert alert-warning" role="alert">
                <p>{{ $error }}</p>
            </div>
            @endforeach
            @endif

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value ="{{ $_SESSION['data']['title'] ?? $post->title }}" >
        </div>


        @if($errors->has('body'))
            @foreach($errors->get("body") as $error)
                <div class="alert alert-warning" role="alert">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="body"> Body</label>
            <textarea  class="form-control" name="body" id="body"  rows="15">{{ $_SESSION['data']['body'] ?? $post->body}}</textarea>
        </div>
        <br><br>
        <div class="mb-3">
        <input type="file" name="file">
        </div>
        <div class="btn btn-primary">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <a href="/post/list">List-Posts</a>



@endsection
