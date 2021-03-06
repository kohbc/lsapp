<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quizzes(){
        return $this->hasMany('App\Quiz');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function results(){
        return $this->hasMany('App\Result');
    }
    
    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function colleagues(){
        return $this->hasMany('App\Colleague');
    }
        
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
