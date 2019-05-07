<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discipline
 *
 * @package App
 * @property string $title
 * @property string $image
 * @property tinyInteger $active
*/
class Discipline extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'image', 'active'];
    protected $hidden = [];
    
    
    
}
