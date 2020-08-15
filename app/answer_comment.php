<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer_comment extends Model
{
    protected $table = "answer_comments";
    protected $fillable = ['user_id','answer_id','comment'];

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
