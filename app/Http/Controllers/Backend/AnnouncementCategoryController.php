<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcementCategories = AnnouncementCategory::latest()->paginate(10);
        $announcementCategory = new AnnouncementCategory();
        return view('backend.announcement-category.index', compact('announcementCategories', 'announcementCategory'));
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
            'name' => 'required|unique:announcement_categories,name'
        ]);
        AnnouncementCategory::create($request->all() + ['slug' => Str::slug($request->name)]);
        return back()->with('success', 'Kategori pengumuman berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnnouncementCategory  $announcementCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AnnouncementCategory $announcementCategory)
    {
        $announcementCategories = AnnouncementCategory::paginate(10);
        return view('backend.announcement-category.edit', compact('announcementCategories', 'announcementCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnnouncementCategory  $announcementCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnnouncementCategory $announcementCategory)
    {
        $request->validate([
            'name' => 'required|unique:announcement_categories,name,' . $announcementCategory->id
        ]);
        $announcementCategory->update($request->all() + ['slug' => Str::slug($request->name)]);
        return redirect()->route('backend.announcement.category.index')->with('success', 'Kategori pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnnouncementCategory  $announcementCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnnouncementCategory $announcementCategory)
    {
        $announcementCategory->delete();
        return redirect()->route('backend.announcement.category.index')->with('success', 'Kategori pengumuman berhasil dihapus');
    }
}
