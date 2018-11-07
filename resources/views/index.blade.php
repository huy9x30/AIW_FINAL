@extends('layouts.master')
    @section('content')
        <style media="screen">
          h2 {
            margin-top:0;
            margin-bottom:30px;
            border-bottom: 1px solid gray;
            padding-bottom: 5px;
            width: fit-content;
          }

          .post-body .title a {
            font-weight: bold;
            color: black;
            text-decoration: none;
            margin-bottom: 5px;
          }

           a {
            color: black !important;
          }

          a:hover {
            color: #337ab7 !important;
            text-decoration: none !important;
          }
        </style>
        @if(isset($categoryName))
        <div class="text-center">
          <h2><b>{{ $categoryName }}</b></h2>
        </div>
        @endif
        @foreach($articles as $article )
        <div class="post">
          <div class="post-body">
            <a href="{{ url('/article/' .$article->id) }}"><img style="width: 400px; height: 250px" src="{{ $article->picture }}" alt="{{ $article->name }}" class="bordered" /></a>
            <h3 class="title"><a href="{{ url('/article/' .$article->id) }}">{{ $article->title }}</a></h3>
            <p class="medium">{{ $article->sub_content }}</p>
            <a href="{{ url('/article/' .$article->id) }}" class="more">Read more &#187;</a> </div>
        </div>
        <div class="content-separator"></div>
        @endforeach
    @endsection
