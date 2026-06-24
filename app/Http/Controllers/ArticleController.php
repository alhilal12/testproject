<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        
        $query = Article::where('is_published', true);
        
        if ($category !== 'all') {
            $query->where('category', $category);
        }
        
        $articles = $query->orderBy('created_at', 'desc')->paginate(9);
        
        // المقال المميز (أحدث مقال في القسم)
        $featuredArticle = Article::where('is_published', true)
                            ->when($category !== 'all', function($q) use ($category) {
                                return $q->where('category', $category);
                            })
                            ->latest()
                            ->first();
        // dd($articles); 
        return view('articles.index', compact('articles', 'featuredArticle', 'category'));
    }
    
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $article->increment('views');
        
        $relatedArticles = Article::where('category', $article->category)
                                  ->where('id', '!=', $article->id)
                                  ->where('is_published', true)
                                  ->limit(3)
                                  ->get();
        
        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
