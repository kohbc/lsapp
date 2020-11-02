<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //Table Name
    protected $table = 'results';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
