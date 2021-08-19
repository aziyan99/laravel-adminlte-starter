<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    public function updateInformation(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect()->back()->with('success', 'Informasi berhasil diperbarui');
    }

    public function updateLogo(Request $request, Setting $setting)
    {
        $request->validate([
            'logo' => 'required|image'
        ]);

        if (Storage::disk('public')->exists($setting->logo)) {
            Storage::disk('public')->delete($setting->logo);
        }

        $logo = $request->file('logo')->store('logo', 'public');
        $setting->update([
            'logo' => $logo
        ]);
        return redirect()->back()->with('success', 'Logo berhasil diperbarui');
    }
}
