<?php

namespace App\Http\Controllers\Api\V1;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;

use App\AssetCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class AssetApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->filter_id) {
            $assets = Asset::where('category_id', $request->filter_id)->get();
        } else {
            $assets = Asset::all();
        }

        foreach ($assets as $key => $asset) {
            $assets[$key] = [
                'id' => $asset->id,
                'thumbUrl' => $asset->getPhotosAttribute()->first()->getFullUrl('works'),
            ];
        }

        return $assets;
    }

    public function categories()
    {
        $categories = AssetCategory::all();

        return $categories;
    }

    public function modal(Request $id)
    {
        $work = Asset::findOrFail($id)->first();
        $work->thumbUrl = $work->getPhotosAttribute()->first()->getFullUrl();

        return $work;
    }

    public function send(Request $data)
    {
        $compactData = [
            "name" => $data->name,
            "mail" => $data->mail,
            "text" => $data->message,
        ];

        Mail::send('contact', $compactData, function($message) {
            $message->to('cactusx09@gmail.com')->subject('Sectatoo "keep in touch with me" letter');
        });

        return 'Message recieved';
    }
}
