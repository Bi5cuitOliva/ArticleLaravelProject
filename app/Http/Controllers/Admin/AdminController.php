<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Dashboard view
    public function index()
    {
        return view('admin.dashboard');
    }

    // Display the list of articles
    public function articles()
    {
        $articles = Article::all(); // You can paginate instead of fetching all records
        return view('admin.articles.index', compact('articles'));
    }

    // Show the form to create a new article
    public function createArticle()
    {
        return view('admin.articles.create');
    }

    // Store a new article (POST)
    public function storeArticle(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5MB max image size
        ]);

        // Handle image upload, if any
        $path = $request->file('image') ? $request->file('image')->store('articles', 'public') : null;

        // Create the article record
        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'image_path' => $path,
        ]);

        // Redirect back to the article list with success message
        return redirect()->route('admin.articles')->with('success', 'Article created successfully!');
    }

    // Show the form to edit an existing article
    public function editArticle(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Update an existing article (PATCH)
    public function updateArticle(Request $request, Article $article)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5MB max image size
        ]);

        // Handle the image upload if a new image is provided, otherwise retain the current image
        $path = $request->file('image') ? $request->file('image')->store('articles', 'public') : $article->image_path;

        // Update the article
        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'image_path' => $path,
        ]);

        // Redirect back to the article list with success message
        return redirect()->route('admin.articles')->with('success', 'Article updated successfully!');
    }

    // Delete an article (DELETE)
    public function deleteArticle(Article $article)
    {
        // Delete the image if it exists
        if ($article->image_path) {
            Storage::delete($article->image_path);
        }

        // Delete the article record from the database
        $article->delete();

        // Redirect back to the article list with success message
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully!');
    }
}
