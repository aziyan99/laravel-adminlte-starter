<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        validate_permission('profile.read');
        $user = $request->user();
        return view('profile.index', compact('user'));
    }

    public function edit(Request $request): View
    {
        validate_permission('profile.update');
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        validate_permission('profile.update');

        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.index')->with('success', 'Profile updated');
    }
}
