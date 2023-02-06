@extends('layouts/layout')

@section('content')
    @foreach($posts as $post)
        <article>
            <h2><a href="posts/{{$post->title}}">{{$post->title}}</a></h2>
            <p>
                <a href="/categories/{{$post->category->name}}">{{$post->category->name}}</a>
            </p>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
@endsection

