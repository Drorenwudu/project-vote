<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), ['email' => ['required', 'max:100', 'unique:users,email']]);
            if($validator->fails()) {
                session()->flash('error', "Ви вже проголосували!");
                return redirect()->back();
            }
                return redirect()->route('vote');
        }

        return Inertia::render("Auth");
    }
}
