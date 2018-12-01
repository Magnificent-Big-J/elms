<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $fillable = ['user_id','status','reason','call_date','call_type_id'];

    public function callType(){
        return $this->belongsTo(CallTypes::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
