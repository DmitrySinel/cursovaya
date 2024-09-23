<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;
use App\Models\WordView;

class IndexController extends Controller
{
    public function index(EnglishWord $word)
    {
        WordView::createViewLog($word);
        return view('word.index', compact('word'));
    }
}
