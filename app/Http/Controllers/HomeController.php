<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestPosts = Post::published()
            ->forLocale(app()->getLocale())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('latestPosts'));
    }
}
