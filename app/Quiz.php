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

}
