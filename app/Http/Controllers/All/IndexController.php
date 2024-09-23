<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;

class IndexController extends Controller
{
    public function index()
    {
        $words = EnglishWord::paginate(81);
        return view('all.index', compact('words'));
    }
}
