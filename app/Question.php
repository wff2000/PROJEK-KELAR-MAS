<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany('App\tag', 'question_tag', 'question_id', 'tag_id');
    }

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
