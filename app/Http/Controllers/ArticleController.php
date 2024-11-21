<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index()
    {
        $articles = Article::paginate(9); // Paginate articles (9 per page)
        return view('articles', compact('articles'));
    }

    /**
     * Show the detail page for a single article.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article-detail', compact('article'));
    }
}
