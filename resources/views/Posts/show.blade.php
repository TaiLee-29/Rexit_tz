@extends('layout')

@section('content')


    <h1>{{$post->title}}</h1></a></p><td><form action="{{route('update', $post->id )}}" >
            <input type="submit" value="update" >@csrf</form>
    </td><td><form action="{{route('delete', $post )}}" method="post">@method('delete')
            <input type="submit" value="delete" >@csrf</form></td>
    <p>{{$post->created_at->diffforhumans()}}</p>
    <p>{{$post->body}}</p>
    <p>Views:{{$post->views}}</p>
    <br><br>
    <a href="{{$post->file}}">{{$post->file}}</a>
    <form action="{{route('home')}}" >
        <input type="submit" value="list" >@csrf</form>


@endsection
