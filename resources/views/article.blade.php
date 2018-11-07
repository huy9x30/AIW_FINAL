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

        div.related img {
          height: 200px;
          width: 320px;
        }

        div.related h3 {
          margin-top: 0;
        }

        div.post-tag a,
        div.related a {
          color: black;
        }

        div.post-tag a:hover,
        div.related a:hover {
          color: #337ab7;
          text-decoration: none;
        }

        .post-title {
          margin-bottom:10px;
        }

        .post-date {
          margin-bottom: 30px;
          padding: 5px;
          border-top:1px solid #eee;
          border-bottom:1px solid #eee;
        }

        .post-body {
          color: black;
        }

        .post-tag {
          margin-bottom: 30px;
        }

        h2 {
          margin-top: 0;
        }

        .comment {
          margin-bottom: 50px;
        }
	    </style>

        <div class="post-title">
          <h2><b>{{ $article->title }}</b></h2>
        </div>
        <div class="post-date">{{ $article->date_posted }} by {{ $article->author }}</div>
        <div class="post-body">
         <!--  <p><a href="#"><img src="news-image-big.jpg" alt="" class="bordered" /></a></p>
          <p class="large">This is a free website template by Arcsin, built using tableless XHTML and CSS.</p>
          --> <p>{!! $article->content !!}</p>
        </div>
        <div class="post-tag" style="text-align: right">Tags :
          @foreach ($tags as $tag)
          <a href="{{ url('/tag/' .$tag) }}">{{ $tag }}</a>,
          @endforeach
        </div>
      <div class="comment">
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
          @if(count($comments)>0)
            @foreach($comments as $comment)

                <h3>{{ $comment->user_name }}</h3>
              <!-- </div> -->
              <div class="comment-date"><small>{{ $comment->created_at }}</div>
              <!-- <div class="post-body"> -->
                  <p>{{ $comment->content }}</p>
              <!-- </div> -->
            @endforeach
          @endif
      </div>

      <h1>Other news</h1>
      @if(count($relatedNews) > 0)
        @foreach($relatedNews as $item)
        <div class="content-separator"></div>
        <div class="post row">
          <div class="related col-xs-12 col-sm-6">
            <a href="{{ url('/article/' .$item->id) }}">
              <img src="{{ $item->picture }}" alt="{{ $item->title }}" class="left bordered" />
            </a>
          </div>
          <div class="related col-xs-12 col-sm-6">
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
      @else
        <div class="text-center">
          Sorry, we do not have other news in this subject.
        </div>
      @endif
      <div class="content-separator"></div>

    </div>
    @endsection
