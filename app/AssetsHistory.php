<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetsHistory extends Model
{
    public $table = 'assets_histories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'asset_id',
        'created_at',
        'updated_at',
        'assigned_user_id',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function assigned_user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
}
