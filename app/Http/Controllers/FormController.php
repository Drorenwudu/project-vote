<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'max:100', 'unique:users,email'],
            'checkedAnswer' => 'required']);
        if($validator->fails()) {
            session()->flash('message', "Ви вже проголосували!");
        }else{
            $data = $validator->getData();
            $user = User::create(['email' => $data['email']]);
            foreach ($data['checkedAnswer'] as $item) $checked[] = $item['id'];
            $user->answers()->attach($checked);
            session()->flash('message', "Дякую! За Ваш голос!");
        }

    }
}
