<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::with('category')->latest()->paginate(10);
        return view('backend.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $announcement = new Announcement();
        $announcementCategories = AnnouncementCategory::all();
        return view('backend.announcement.create', compact('announcement', 'announcementCategories'));
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
            'title' => 'required',
            'body' => 'required'
        ]);
        Announcement::create($request->all() + ['slug' => Str::slug($request->title)]);
        return redirect()->route('backend.announcements.index')->with('success', 'Pengumuman berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('backend.announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $announcementCategories = AnnouncementCategory::all();
        return view('backend.announcement.edit', compact('announcement', 'announcementCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $announcement->update($request->all() + ['slug' => Str::slug($request->title)]);
        return redirect()->route('backend.announcements.index')->with('success', 'Pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('backend.announcements.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
