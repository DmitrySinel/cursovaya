<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;
use App\Models\WordView;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function index(EnglishWord $word)
    {
        if(auth()->check()){
            WordView::createViewLog($word);
        }
        return view('word.show', compact('word'));
    }
}
