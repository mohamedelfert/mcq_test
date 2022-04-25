<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

//    protected $guarded = [];
    protected $fillable = ['id', 'question_ar', 'question_en', 'topic_id', 'description'];
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }
}
