<?php

namespace App\Http\ViewComposers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\View\View;
//use App\Repositories\UserRepository;

class AsideComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::orderBy('name','ASC')->get();
        $tags = Tag::with('articles')->get()->sortBy(function($tag)
        {
            return $tag->articles->count();
        },$options = SORT_REGULAR, $descending = true);
        $articles = Article::orderBy('title','ASC')->count();
        $view->with('categories', $categories)
            ->with('tags', $tags)
            ->with('articles_count', $articles);
    }
}