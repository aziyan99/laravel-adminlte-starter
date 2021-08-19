<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCategories = ArticleCategory::latest()->paginate(10);
        $articleCategory = new ArticleCategory();
        return view('backend.article-category.index', compact('articleCategories', 'articleCategory'));
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
            'name' => 'required'
        ]);
        ArticleCategory::create($request->all() + ['slug' => Str::slug($request->name)]);
        return redirect()->route('backend.article.category.index')->with('success', 'Kategori berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        $articleCategories = ArticleCategory::latest()->paginate(10);
        return view('backend.article-category.edit', compact('articleCategories', 'articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $articleCategory->update($request->all() + ['slug' => Str::slug($request->name)]);
        return redirect()->route('backend.article.category.index')->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();
        return redirect()->route('backend.article.category.index')->with('success', 'Kategori berhasil dihapus');
    }
}
