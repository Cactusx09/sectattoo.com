<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';

    protected $fillable = [
        'title',
        'text',
    ];

    // public function assets()
    // {
    //     return $this->hasMany(Asset::class, 'category_id', 'id');
    // }
}
