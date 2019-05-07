<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @package App
 * @property string $title
 * @property string $discipline
 * @property integer $class
 * @property text $description
 * @property string $category_image
 * @property string $created_by
 * @property tinyInteger $active
*/
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'class', 'description', 'category_image', 'active', 'discipline_id', 'created_by_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDisciplineIdAttribute($input)
    {
        $this->attributes['discipline_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setClassAttribute($input)
    {
        $this->attributes['class'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id')->withTrashed();
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
