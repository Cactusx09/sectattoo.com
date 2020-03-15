<?php

namespace App\Http\Controllers\Api\V1;

use App\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionApiController extends Controller
{
    public function index()
    {
        return Question::all();
    }
}
