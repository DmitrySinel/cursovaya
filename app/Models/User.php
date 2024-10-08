<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'role' => RoleEnum::class,
    ];

    public static function viewed() {
        return EnglishWord::join("word_views", "word_views.english_word_id", "=", "english_words.id")
        ->groupBy("english_words.id", 'word_views.created_at')
        ->where('word_views.user_id', Auth::user()->id)
        ->where('english_words.status', 1)
        ->orderBy(DB::raw('word_views.created_at'), 'desc')
        ->limit(50)
        ->get(['english_words.*']);
    }

    public function testsResult() {
        return $this->hasMany(TestResults::class);
    }

    public function userSumResult() {
        return $this->testsResult->sum('result');
    }

    public function userTestCount() {
        return $this->testsResult->count();
    }
}
