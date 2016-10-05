<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
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

    public function employees() {
        return $this->belongsTo('App\Employee');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
