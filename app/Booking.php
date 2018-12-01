<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_type_id','address','start_date','end_date','status'];

    public function bookingType(){
        return $this->belongsTo(BookingType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
