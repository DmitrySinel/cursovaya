<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'result',
        'tag_id',
        'user_id',
    ];
}
