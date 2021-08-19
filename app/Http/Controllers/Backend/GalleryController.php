<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = new Gallery();
        return view('backend.gallery.create', compact('gallery'));
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
            'name' => 'required|unique:galleries,name'
        ]);
        Gallery::create($request->all() + ['slug' => $request->name]);
        return redirect()->route('backend.galleries.index')->with('success', 'Galeri berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $details = GalleryDetail::where('gallery_id', $gallery->id)->latest()->paginate(5);
        return view('backend.gallery.show', compact('gallery', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|unique:galleries,name,' . $gallery->id
        ]);
        $gallery->update($request->all() + ['slug' => $request->name]);
        return redirect()->route('backend.galleries.index')->with('success', 'Galeri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $details = GalleryDetail::where('gallery_id', $gallery->id)->get();
        foreach ($details as $detail) {
            if (Storage::disk('public')->exists($detail->image)) {
                Storage::disk('public')->delete($detail->image);
            }
        }

        $gallery->delete();
        return redirect()->route('backend.galleries.index')->with('success', 'Galeri berhasil dihapus');
    }
}
