<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordUserController extends Controller
{
    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make($user->email)
        ]);
        return redirect()->back()->with('success', 'Password berhasil direset');
    }
}
