<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //Table Name
    protected $table = 'quizzes';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function results(){
        return $this->hasMany('App\Result');
    }
}
