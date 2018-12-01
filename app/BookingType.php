<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingType extends Model
{
    protected $fillable = ['description'];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

}
