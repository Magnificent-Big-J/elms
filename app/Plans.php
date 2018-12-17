<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['plan_type_id','motivation','status','user_id','plan_date'];

    public function planType(){
        return $this->belongsTo(PlanType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function documents(){
        return $this->hasMany(documents::class);
    }
    public function scopeMine($query){

        return $query->whereUserId(auth()->user()->id);
    }
}
