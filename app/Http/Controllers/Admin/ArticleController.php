<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('articles', 'public');
    }

    Article::create([
        'title' => $request->title,
        'slug' => \Illuminate\Support\Str::slug($request->title),
        'content' => $request->content,
        'image' => $imagePath,
        'category' => $request->category,
        'author_id' => auth()->id(),
        'is_published' => $request->has('is_published') ? 1 : 0, // ✅ الـ 1 و 0 أكثر أماناً
    ]);

    return redirect()->route('admin.articles.index')->with('success', 'تم إضافة المقال بنجاح');
}


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

 public function update(Request $request, $id)
{
    $article = Article::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = [
        'title' => $request->title,
        'content' => $request->content,
        'category' => $request->category,
        'is_published' => $request->has('is_published') ? 1 : 0, // ✅ الـ 1 و 0 أكثر أماناً
    ];

    if ($request->hasFile('image')) {
        if ($article->image) {
            \Storage::disk('public')->delete($article->image);
        }
        $data['image'] = $request->file('image')->store('articles', 'public');
    }

    $article->update($data);

    return redirect()->route('admin.articles.index')->with('success', 'تم تحديث المقال بنجاح');
}

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image) {
            \Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        
        return redirect()->route('admin.articles.index')
                         ->with('success', 'تم حذف المقال بنجاح');
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