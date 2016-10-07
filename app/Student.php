<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'lastName',
        'firstName',
        'dob',
        'gender',
        'address',
        'city',
        'state',
        'zip',
        'email',
        'phone',
        'school',
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function grades() {
        return $this->hasMany('App\Grade');
    }
}
