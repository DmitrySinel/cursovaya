<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function words() {
        return $this->belongsToMany(EnglishWord::class, 'tag_words');
    }
}
