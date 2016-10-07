<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=[
        'subject',
        'period',
        'actual',
        'comments',
    ];

    public function students()
    {
    	$this->hasMany('App\Student');
    }
}
