<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdatePasswordRequest;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(auth()->user()->id);
        return view('backend.profile.index', compact('profile'));
    }

    public function updateGeneralInformation(UpdateProfileRequest $request, $id)
    {
        if ($id != auth()->user()->id) {
            return back();
        } else {
            $profile = User::findOrFail($id);
            $profile->update($request->all());
            return back()->with('success', 'Profile berhasil diperbarui');
        }
    }

    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        if ($id != auth()->user()->id) {
            return back();
        } else {
            $profile = User::findOrFail($id);
            $profile->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Password berhasil diperbarui');
        }
    }

    public function updateImage(Request $request)
    {
        $profile = User::findOrFail(auth()->user()->id);
        if ($request->file('image') == "") {
            return back()->with('error', 'Gagal mengubah gambar');
        } else {
            $image = $request->file('image')->store('profile_images', 'public');
            if (Storage::disk('public')->exists($profile->image)) {
                Storage::disk('public')->delete($profile->image);
            }
            $profile->update([
                'image' => $image
            ]);
            return back()->with('success', 'Gambar profil berhasil diperbarui');
        }
    }
}
