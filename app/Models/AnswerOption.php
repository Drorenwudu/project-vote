<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AnswerOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
