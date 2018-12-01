<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['user_id','meeting_type_id','address','start_date','end_date','status','reason'];

    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
