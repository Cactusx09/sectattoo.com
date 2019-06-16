<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Work
 *
 * @package App
 * @property string $image
 * @property string $title
 * @property string $description
*/
class Work extends Model
{
    use SoftDeletes;

    protected $fillable = ['image', 'title', 'description'];
    protected $hidden = [];
    
    
    
}
