<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(5);
        $articles->each(function ($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });
        return view('home')->with('articles', $articles);
    }

    public function searchCategory($name)
    {
        $category = Category::searchCategory($name)->first(); //Extraigo el primer elemento de la coleccion para tenerlo como objeto. (Siempre va a traer solo un elemento. El nombre el unico)
        $articles = $category->articles()->paginate(5);
        $articles->each(function ($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });
        return view('home')->with('articles', $articles)
            ->with('category', $category);
    }

    public function searchTag($name)
    {
        $tag = Tag::searchTag($name)->first(); //Extraigo el primer elemento de la coleccion para tenerlo como objeto. (Siempre va a traer solo un elemento. El nombre el unico)
        $articles = $tag->articles()->paginate(5);
        $articles->each(function ($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });
        return view('home')->with('articles', $articles)
            ->with('tag', $tag);
    }

    public function viewArticle($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        $article->category;
        $article->user;
        $article->images;
        $article->tags;

        return view('article.index')->with('article', $article);
    }
}
