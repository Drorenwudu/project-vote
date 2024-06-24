<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Inertia\Inertia;
use PHPUnit\Exception;

class QuestionnaireController extends Controller
{
    public function show()
    {
        $data = Question::find(1);

        if(is_null($data)){
            return Inertia::render("Error", ['err' => 'Ви не можете голосувати зараз!']);
        }

        foreach ($data->answerOption as $option) {
            $arrayOptionAnswer [] = ['id' => $option->id, 'name' => $option->answer];
        }
        return Inertia::render("Vote",
            [
                "title" => $data->title,
                "text" => $data->text,
                "answers" => $arrayOptionAnswer,
            ]
        );
    }
}
