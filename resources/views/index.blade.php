@extends('layouts.master')
    @section('content')
        @if($categoryName)
        <ul style="display: inline; list-style-type: none">
          <li style="float: left"><a href="{{ url('/') }}">Home</a></li>
          <li style="float: left; margin: 0px 5px"> / </li>
          <li style="float: left">{{ $categoryName }}</li>
        </ul>
        @endif
        @foreach($articles as $article )
        <div class="post">
          <div class="post-title">
            <h2><a href="{{ url('/article/' .$article->id) }}">{{ $article->name }}</a></h2>
          </div>
          <div class="post-date">{{ $article->date_posted }} by {{ $article->author }}</div>
          <div class="post-body">
            <p><a href="{{ url('/article/' .$article->id) }}"><img style="width: 400px; height: 250px" src="{{ $article->picture }}" alt="{{ $article->name }}" class="bordered" /></a></p>
            <p class="large">{{ $article->sub_content }}</p>
            <a href="{{ url('/article/' .$article->id) }}" class="more">Read more &#187;</a> </div>
        </div>
        <div class="content-separator"></div>
        @endforeach
    @endsection
