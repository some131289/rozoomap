<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Test
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property string $test_image
 * @property string $category
 * @property tinyInteger $active
*/
class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'test_image', 'active', 'category_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    
    public function question()
    {
        return $this->belongsToMany(Question::class, 'question_test')->withTrashed();
    }
    
}
