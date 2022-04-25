<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

//    protected $guarded = [];
    protected $fillable = ['id', 'user_id', 'test_id', 'question_id', 'option_id', 'point'];
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
