<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingType extends Model
{
    protected $fillable = ['description'];
    public function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
