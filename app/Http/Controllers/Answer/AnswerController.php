<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function show($id){
        return view('client.showAnswer');
    }
}
