<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
    
    public function admins() {
        return $this->belongsTo('App\Admin');
    }
    
    public function mentors(){
        return $this->hasMany('App\Mentor');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
