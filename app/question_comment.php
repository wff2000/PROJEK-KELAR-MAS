<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question_comment extends Model
{
    protected $table = "question_comments";
    protected $guarded = [];

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
