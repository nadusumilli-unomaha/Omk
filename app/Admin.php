<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=[
        'lastName',
        'firstName',
        'address',
        'city',
        'state',
        'zip',
        'email',
        'phone',
        'school',
    ];
    
    public function employees() {
        return $this->hasMany('App\Employee');
    }

    public function grades() {
        return $this->hasMany('App\Grade');
    }

    public function users() {
        return $this->hasOne('App\User');
    }
    
    public function mentors(){
        return $this->hasMany('App\Mentor');
    }
}
