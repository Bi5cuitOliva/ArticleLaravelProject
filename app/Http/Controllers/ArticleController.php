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
        // Paginate articles (9 per page)
        $articles = Article::paginate(9);

        // Return articles view with paginated articles
        return view('articles', compact('articles'));
    }

    /**
     * Show the detail page for a single article.
     */
    public function show($slug)
    {
        // Find article by slug, if not found show a 404 error
        $article = Article::where('slug', $slug)->firstOrFail();

        // Return the article detail view
        return view('article-detail', compact('article'));
    }
}
