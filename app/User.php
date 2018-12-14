<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password','surname','contact_number','gender','address','postal_code','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function suggestions(){
        return $this->hasMany(Suggestion::class);
    }
    public function meetings(){
        return $this->hasMany(Meeting::class);
    }
    public function bills(){
        return $this->hasMany(Bills::class);
    }
    public function calls(){
        return $this->hasMany(Calls::class);
    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    public function plans(){
        return $this->hasMany(Plans::class);
    }
    public function documents(){
        return $this->hasMany(documents::class);
    }
}
