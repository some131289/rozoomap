<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @package App
 * @property text $question
 * @property string $question_image
 * @property integer $score
 * @property text $answer1
 * @property tinyInteger $correct1
 * @property text $answer2
 * @property tinyInteger $correct2
 * @property text $answer3
 * @property tinyInteger $correct3
 * @property text $answer4
 * @property tinyInteger $correct4
 * @property text $answer5
 * @property tinyInteger $correct5
*/
class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['question', 'question_image', 'score', 'answer1', 'correct1', 'answer2', 'correct2', 'answer3', 'correct3', 'answer4', 'correct4', 'answer5', 'correct5'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setScoreAttribute($input)
    {
        $this->attributes['score'] = $input ? $input : null;
    }
    
}
