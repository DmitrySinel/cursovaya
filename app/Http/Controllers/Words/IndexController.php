<?php

namespace App\Http\Controllers\Words;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;

class IndexController extends Controller
{
    public function index()
    {
        $words = EnglishWord::where('status', 1)->paginate(81);
        return view('words.index', compact('words'));
    }
}
