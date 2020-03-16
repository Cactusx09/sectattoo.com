<?php

namespace App\Http\Controllers\Api\V1;

use App\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextApiController extends Controller
{
    public function index()
    {
        $textsArray = collect(Text::all());

        $texts = $textsArray->keyBy('name');

        return $texts;
    }
}
