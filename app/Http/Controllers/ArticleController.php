<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->take(3)->get();
        return view('index', compact('articles'));
    }

    public function showCategory($category_path)
    {
        $category_id = Category::where('path', $category_path)->first()->id;
        $articles = Article::where('category_id', $category_id)->get();
        $categoryName = Category::find($category_id)->name;

        return view('index', compact('articles', 'categoryName'));
    }

    public function showArticle($article_id)
    {
        $article = Article::find($article_id);
        $category_id = $article->category_id;
        $relatedNews = Article::where('category_id', $category_id)->take(5)->get();
        $comments = Comment::where('article_id', $article_id)->get();
        $tags = explode(",", $article->tags);

        return view('article', compact('article', 'relatedNews', 'comments', 'tags'));
    }

    public function showAll()
    {
        $articles = Article::paginate(8);
        return view('index', compact('articles'));
    }

    public function comment(Request $request, $article_id){
        var_dump($request->url());
        if($request->has('name') && $request->has('content'))
        {
            $comment = new Comment;
            $comment->article_id = $article_id;
            $comment->user_name = $request->name;
            $comment->content = $request->content;
            $comment->save();
        } else {
            return redirect()->back()->with('alert', 'Fill in your name and content before click comment');
        }

        return redirect()->back();
    }

    public function showTag($tag)
    {
        $articles = Article::where('tags', 'LIKE', '%'.$tag.'%')->paginate(4);
        $tag = $tag;

        return view('tag', compact('articles', 'tag'));

    }
}
