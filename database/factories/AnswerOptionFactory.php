<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AnswerOption;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerOption>
 */
class AnswerOptionFactory extends Factory
{
    protected $model = AnswerOption::class;
    public function definition(): array
    {
        return [
            'question_id' => rand(1,5),
            'answer' => $this->faker->sentence(),
        ];
    }
}
