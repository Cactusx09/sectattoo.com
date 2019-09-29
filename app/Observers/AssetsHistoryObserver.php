<?php

namespace App\Observers;

use App\Asset;
use App\AssetsHistory;

class AssetsHistoryObserver
{
    public function updated(Asset $asset)
    {
        if (auth()->check()) {
            AssetsHistory::create([
                'asset_id'         => $asset->id,
                'assigned_user_id' => $asset->assigned_to_id,
            ]);
        };
    }
}
