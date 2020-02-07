<?php

namespace App\Http\Controllers\Api\V1;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Http\Resources\Admin\AssetResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\AssetCategory;

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

        $data = [
            'assets' => $assets,
            'categories' => AssetCategory::all(),
        ];

        return $data;
    }

    public function modal(Request $id)
    {
        $work = Asset::findOrFail($id)->first();
        $work->thumbUrl = $work->getPhotosAttribute()->first()->getFullUrl();

        return $work;
    }
}
