<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Asset extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'assets';

    protected $appends = [
        'photos',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
        'assigned_to_id',
    ];

    public static function boot()
    {
        parent::boot();
        Asset::observe(new \App\Observers\AssetsHistoryObserver);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
        $this->addMediaConversion('works')->width(437)->height(532);
    }

    public function assetsHistories()
    {
        return $this->hasMany(AssetsHistory::class, 'asset_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id');
    }

    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}
