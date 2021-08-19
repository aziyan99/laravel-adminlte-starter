<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryDetailController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        $image = $request->file('image')->store('galleries', 'public');
        GalleryDetail::create([
            'image' => $image,
            'gallery_id' => $gallery->id
        ]);
        return back()->with('success', 'Gambar berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryDetail  $galleryDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryDetail $galleryDetail)
    {
        if (Storage::disk('public')->exists($galleryDetail->image)) {
            Storage::disk('public')->delete($galleryDetail->image);
        }
        $galleryDetail->delete();
        return back()->with('success', 'Gambar berhasil dihapus');
    }
}
