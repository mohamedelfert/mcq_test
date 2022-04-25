<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

//    protected $guarded = [];
    protected $fillable = ['id', 'result', 'user_id'];
    protected $casts = ['created_at' => 'datetime:Y-m-d H:m:s', 'updated_at' => 'datetime:Y-m-d H:m:s'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
