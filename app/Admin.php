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
        'type',
        'user_id'
    ];
    
    public function employees() {
        return $this->hasMany('App\Employee');
    }

    public function grades() {
        return $this->hasMany('App\Grade');
    }
    
    public function mentors(){
        return $this->hasMany('App\Mentor');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
