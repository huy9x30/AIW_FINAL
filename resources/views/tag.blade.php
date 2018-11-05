 @extends('layouts.master')
    @section('content')
    <div class="main" id="main-two-columns">
      <div class="left" id="main-left">
        <style>
          #related {
            width: 400px;
            height: 250px;
          }
        </style>
        <h3>Search result: {{ $tag }}</h3>
        @if(count($articles))
          @foreach($articles as $item)
          <div class="post">
            <div class="post"> <a href="{{ url('/article/' .$item->id) }}"><img id="related" src="{{ $item->picture }}" alt="{{ $item->title }}" class="left bordered" /></a>
              <h3><a href="{{ url('/article/' .$item->id) }}">{{ $item->title }}</a></h3>
              <p>{{ $item->sub_content }}</p>
              <a href="{{ url('/article/' .$item->id) }}" class="more">Read more &#187;</a>
              <div class="clearer">&nbsp;</div>
            </div>
            <div class="content-separator"></div>

          </div>
          @endforeach

          <div style="text-align: right;">
          {{ $articles->links() }}
          </div>
        @else
        <div class="post">Find no news with key word {{ $tag }}</div>
        @endif

      </div>
      <div class="clearer">&nbsp;</div>
    </div>
    @endsection
