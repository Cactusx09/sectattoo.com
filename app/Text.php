<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = [
        'bio',
        'phone',
        'mail',
        'instagram',
        'facebook',
    ];
}
