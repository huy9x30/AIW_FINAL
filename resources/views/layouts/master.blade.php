<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<title>Bayram Newspaper</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css\style.css') }}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('css\bootstrap.min.css')}}" />
</head>
<body id="top">
  <style media="screen">
    body {
        font-family: 'PT Serif',serif;
    }

    p {
      font-size: 16px;
    }

    #main-nav a {
      font-weight: bold;
      color: black;
    }

    #main-nav a:hover {
      color: black;
    }

    #navigation {
      border-bottom: 1px solid #CCC;
      margin-bottom: 50px;
    }

    .nice-list a {
      color: black !important;
    }

    .nice-list a:hover {
      color: #337ab7 !important;
      text-decoration: none !important;
    }

    ul.tabbed a:hover {
      color: #337ab7 !important;
    }

  </style>
<div id="network">
  <div class="center-wrapper">
    <div class="left">{{ $time }}<span class="text-separator"></div>
    <div class="right">
    </div>
    <div class="clearer">&nbsp;</div>
  </div>
</div>
<div id="site">
  <div class="center-wrapper">
    <div id="header">
      <div class="right" id="toolbar">
      </div>
      <div class="clearer">&nbsp;</div>
      <div id="site-title">
        <h1><a href="{{ url('/') }}">Bayram Newspaper</a></h1>
      </div>
      <div id="navigation">
        <div id="main-nav">
          <ul class="tabbed">
            @foreach($categories as $category)
            <li><a href="{{ url('/category/' .$category->path) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
          <div class="clearer">&nbsp;</div>
        </div>
      </div>
    </div>

    <div class="main" id="main-two-columns">
      <div class="left" id="main-left">
        @yield('content')
      </div>
      <div class="right sidebar" id="sidebar">
        <div class="section">
          <div class="section-title">
            <div class="left">Latest news</div>
            <div class="right"><img src="img/icon-time.gif" width="14" height="14" alt="" /></div>
            <div class="clearer">&nbsp;</div>
          </div>
          <div class="section-content">
            <ul class="nice-list">
                @foreach($latestNews as $news)
              <li>
                <div class="left"><a href="{{ url('/article/' .$news->id) }}">{{ $news->title }}</a></div>
                <div class="right">{{ $news->date_posted }}</div>
                <div class="clearer">&nbsp;</div>

              </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="clearer">&nbsp;</div>
    </div>

    <div id="dashboard">
      <div class="column left" id="column-1">
        <div class="column-content">
          <div class="column-title">Bayram Newspaper</div><br />
          <p>Collect hot news all around the world</p>
          <!-- <a href="#">Learn more &#187;</a> -->
           </div>
      </div>
      <div class="column left" id="column-2">
        <div class="column-content">
          <div class="column-title"></div>
          <ul class="plain-list">
            <!-- <li><a href="#" class="feed">Consectetur</a></li> -->
            <!-- <li><a href="#" class="feed">Adipicing elit</a></li> -->
          </ul>
        </div>
      </div>
      <div class="column left" id="column-3">
        <div class="column-content">
          <div class="column-title"></div>
          <!-- <a href="#">Frequently Asked Questions (FAQ) &#187;</a> -->
           </div>
      </div>
      <div class="column right" id="column-4">
        <div class="column-content">
          <div class="column-title">

          </div>
        </div>
      </div>
      <div class="clearer">&nbsp;</div>
    </div>
    <div id="footer">
      <div class="left">&copy; 2018 Bayram Newspaper <span class="text-separator">&rarr;</span>
            @foreach($categories as $category)
            <a href="{{ url('/category/' .$category->path) }}">{{ $category->name }}</a> <span class="text-separator">|</span>
            @endforeach
      </div>
      <!-- <div class="right"><a href="http://templates.arcsin.se/">Website template</a> by <a href="http://arcsin.se/">Arcsin</a></div> -->
      <div class="clearer">&nbsp;</div>
    </div>
  </div>
</div>
</body>
</html>
