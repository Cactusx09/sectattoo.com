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

class AssetApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::all();
        foreach ($assets as $key => $asset) {
            // dd($asset[0]);
            $assets[$key] = [
                'id' => $asset->id,
                'thumbUrl' => $asset->getMedia('photos')->first()->getFullUrl('works'),
            ];
        }
        return $assets;
    }

    public function store(StoreAssetRequest $request)
    {
        $asset = Asset::create($request->all());

        if ($request->input('photos', false)) {
            $asset->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        return (new AssetResource($asset))
            ->response();
    }

    public function modal(Request $id)
    {
        $work = Asset::findOrFail($id)->first();
        $work->thumbUrl = $work->getMedia('photos')->first()->getFullUrl();

        return $work;
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset->update($request->all());

        if ($request->input('photos', false)) {
            if (!$asset->photos || $request->input('photos') !== $asset->photos->file_name) {
                $asset->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($asset->photos) {
            $asset->photos->delete();
        }

        return (new AssetResource($asset))
            ->response();
    }

    public function destroy(Asset $asset)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
