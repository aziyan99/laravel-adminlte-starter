<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = "";
        if (auth()->user()->hasRole('Super Admin')) {
            $articles = Article::with('category', 'writer')->latest()->paginate(10);
        } else {
            $articles = Article::with('category')->where('user_id', auth()->user()->id)->latest()->paginate(10);
        }
        return view('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        $articleCategories = ArticleCategory::all();
        return view('backend.article.create', compact('article', 'articleCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles,title',
            'article_category_id' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required'
        ]);
        $thumbnail = $request->file('thumbnail')->store('article_thumbnails', 'public');
        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'article_category_id' => $request->article_category_id,
            'thumbnail' => $thumbnail,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('backend.articles.index')->with('success', 'Artikel berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backend.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $articleCategories = ArticleCategory::all();
        return view('backend.article.edit', compact('article', 'articleCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $thumbnail = $article->thumbnail;
        if ($request->file('thumbnail')) {
            $request->validate(['thumbnail' => 'required|image']);
            if (Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('article_thumbnails', 'public');
        }

        $request->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'article_category_id' => 'required',
            'body' => 'required'
        ]);

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'article_category_id' => $request->article_category_id,
            'thumbnail' => $thumbnail,
            'body' => $request->body
        ]);
        return redirect()->route('backend.articles.index')->with('success', 'Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();
        return redirect()->route('backend.articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}
