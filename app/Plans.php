<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['plan_type_id','motivation','status','reason','user_id','plan_date'];

    public function planType(){
        return $this->belongsTo(PlanType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
