<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\User;
use App\Models\WordView;

class IndexController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('words')->get();
        $views = WordView::mostShowed();
        $viewed = User::viewed();
        return view('main.index', compact('tags', 'views', 'viewed'));
    }
}
