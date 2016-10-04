<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function admins() {
        return $this->belongsTo('App\Admin');
    }

    public function employees() {
        return $this->belongsTo('App\Employee');
    }

    public function mentors() {
        return $this->belongsTo('App\Mentor');
    }
    
}
