<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::all()->count();
        $gallery_count = Gallery::all()->count();
        $announcement_count = Announcement::all()->count();
        $article_count = Article::all()->count();
        return view('backend.dashboard.index', compact('user_count', 'gallery_count', 'announcement_count', 'article_count'));
    }
}
