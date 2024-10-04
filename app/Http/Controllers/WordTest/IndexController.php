<?php

namespace App\Http\Controllers\WordTest;

use App\Http\Controllers\Controller;
use App\Models\EnglishWord;
use App\Models\RussianWord;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $answer = $request->answer;
        if(isset($request->otv)){
            $answer[$request->word] = $request->otv;
        }
        if($answer != null && count($answer) == 10) {
            $trueCount = 0;
            foreach($answer as $item)
            {
                if($item == 1)
                    $trueCount++;
            }
           return view('wordtest.show', ['answers' => $answer, 'trueCount' => $trueCount]);
        }

        $tagId = $request->tagId;
        $word = Tag::all()->where('id', $tagId)->first()->words->random(1)->first();

        $translate = EnglishWord::where("word", $word->word)->first()->translate->first();
        $falseVariants = RussianWord::all()->where('word', '<>', $translate)->random(3);

        $index = rand(0, 2);
        $j = 0;
        for($i = 0; $i < 4; $i++) {
            if($i == $index) {
                $allVariants[$index] = $translate;
            } else {
                $allVariants[$i] = $falseVariants[$j];
                $j++;
            }
        }

        $test = ['original' => $word, 'translate' => $translate, 'variants' => $allVariants];
        return view('wordtest.index', ['tagId' => $tagId, 'test' => $test, 'answer' => $answer]);
    }
}
