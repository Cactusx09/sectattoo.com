<?php

namespace App\Http\Controllers\Admin;

use App\Text;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTextRequest;

class HomeController
{
    public function index()
    {
        $textsArray = collect(Text::all());

        $texts = $textsArray->keyBy('name');

        return view('home', compact('texts'));
    }

    public function update(UpdateTextRequest $request, Text $texts)
    {
        $bio = $texts->findOrFail(1);
        $bio->value = $request->bio;
        $bio->save();

        $phone = $texts->findOrFail(2);
        $phone->value = $request->phone;
        $phone->save();

        $mail = $texts->findOrFail(3);
        $mail->value = $request->mail;
        $mail->save();

        $instagram = $texts->findOrFail(4);
        $instagram->value = $request->instagram;
        $instagram->save();

        $facebook = $texts->findOrFail(5);
        $facebook->value = $request->facebook;
        $facebook->save();

        return redirect('/admin');
    }
}
