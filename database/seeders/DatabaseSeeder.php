<?php

namespace Database\Seeders;

use App\Models\AnswerOption;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Question::factory()->create(['title'=>'Голосування: Членів ради директорів', 'text' => 'Будь ласка, виберіть членів Ради директорів, які, на вашу думку, найкраще підходять для керівництва нашою організацією.']);
        // Question::factory()->count(5)->create();

        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Анна Шевченко']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Сергій Василенко']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Наталія Морозова']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Михайло Ковальчук']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Марина Морозова']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Іван Петров']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Петро Іванов']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Марина Григоренко']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Оксана Мельник']);
        AnswerOption::factory()->create(['question_id' => 1, 'answer' => 'Віталій Павлов']);
        // AnswerOption::factory()->count(20)->create();
    }
}
