<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table = 'question_options';

//    protected $guarded = [];
    protected $fillable = ['id', 'option', 'point', 'question_id'];
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
