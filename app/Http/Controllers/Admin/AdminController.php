<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function articles()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function createArticle()
    {
        return view('admin.articles.create');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('articles', 'public') : null;

        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.articles')->with('success', 'Article created successfully!');
    }

    public function editArticle(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function updateArticle(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('articles', 'public') : $article->image_path;

        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.articles')->with('success', 'Article updated successfully!');
    }

    public function deleteArticle(Article $article)
    {
        if ($article->image_path) {
            \Storage::delete($article->image_path);
        }

        $article->delete();

        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully!');
    }
}
