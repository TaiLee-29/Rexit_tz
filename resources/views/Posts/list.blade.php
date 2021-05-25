@extends('layout')

@section('title', 'Posts')


@section('content')
    <a href="/post/create">Create</a>
    @foreach($posts ?? '' as $post)
        <div class="border border-primary">
            @include('partials.posts', ['post' => $post])
            <a href="{{$post->file}}">{{$post->file}}</a>
        </div>
        <br>
    @endforeach


    @include('paginate', ['pages' =>$posts ?? '' ?? ''])
@endsection
