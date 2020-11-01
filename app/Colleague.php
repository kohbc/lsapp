<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colleague extends Model
{
    //Table Name
    protected $table = 'colleagues';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
