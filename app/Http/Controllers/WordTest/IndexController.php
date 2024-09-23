<?php

namespace App\Http\Controllers\WordTest;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;
use App\Models\Tag;

class IndexController extends Controller
{
    public function index(Tag $tag)
    {
        $word = $tag->words->random(1)->first();
        $translate = EnglishWord::where('id', $word->id)->first()->translate->random(1)->first();
        return view('wordtest.index', compact('word', 'translate'));
    }
}
