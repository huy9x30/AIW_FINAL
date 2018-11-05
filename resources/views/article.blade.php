@extends('layouts.master')
    @section('content')
                    @if (session('alert'))
                    <div class="alert alert-infor">
                      {{ session('alert') }}
                    </div>
                    @endif
      <div class="post">
      <style>
      	img {
      		width: 100%;
      	}

        div.related {
          width: 50%;
        }
	    </style>
        <div class="post-title">
          <h2><a href="{{ url('/article/' .$article->id) }}">{{ $article->title }}</a></h2>
        </div>
        <div class="post-date">{{ $article->date_posted }} posted by {{ $article->author }}</div>
        <div class="post-body">
         <!--  <p><a href="#"><img src="news-image-big.jpg" alt="" class="bordered" /></a></p>
          <p class="large">This is a free website template by Arcsin, built using tableless XHTML and CSS.</p>
          --> <p>{!! $article->content !!}</p>
        </div>
        <div class="post-date" style="text-align: right">Tags :
          @foreach ($tags as $tag)
          <a href="{{ url('/tag/' .$tag) }}">{{ $tag }}</a>,
          @endforeach
        </div>
      @if(count($comments)>0)
        <h2 style="background-color: lightblue">Bình luận</h2>
        @foreach($comments as $comment)

            <h3 style="color: green">{{ $comment->user_name }}</h3>
          <!-- </div> -->
          <div class="post-date">{{ $comment->created_at }}</div>
          <!-- <div class="post-body"> -->
              <p>{{ $comment->content }}</p>
          <!-- </div> -->
      <div class="content-separator"></div>
        @endforeach

      @else

      @endif
        <br>
      <div style="background-color: lightgray; padding: 10px">

          <h5><b>Leave your comment</b></h5>
          <form method="post" action="{{ url('/article/' .$article->id) }}">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" required="" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Content</label>
              <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
              <textarea required="" class="form-control" name="content" id="" cols="30" rows="5"></textarea>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">Comment</button>
          </form>
      </div>

      <hr>
      <h1>Other news</h1>

      @foreach($relatedNews as $item)
      <div class="content-separator"></div>
      <div class="post row">
        <div class="col-xs-12 col-sm-6">
          <a href="{{ url('/article/' .$item->id) }}">
            <img src="{{ $item->picture }}" alt="{{ $item->title }}" class="left bordered" />
          </a>
        </div>
        <div class="col-xs-12 col-sm-6">
          <h3><a href="{{ url('/article/' .$item->id) }}">{{ $item->title }}</a></h3>
          <p>
            {{ $item->sub_content }}
            <br>
            <a href="{{ url('/article/' .$item->id) }}" class="more">Read more &#187;</a>
          </p>
        </div>
        <div class="clearer">&nbsp;</div>
      </div>
      @endforeach
      <div class="content-separator"></div>

    </div>
    @endsection
