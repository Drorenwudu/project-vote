<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
    ];

    public function answerOption()
    {
        return $this->hasMany(AnswerOption::class);
    }
}
