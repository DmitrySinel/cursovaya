<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishWord extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function translate() {
        return $this->belongsToMany(RussianWord::class, 'english_russian_words');
    }

    public function tag() {
        return $this->belongsToMany(Tag::class, 'tag_words');
    }

    public function wordView()
    {
        return $this->hasMany(WordView::class);
    }
}
