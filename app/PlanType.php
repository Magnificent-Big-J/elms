<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanType extends Model
{
    protected $fillable = ['description'];

    public function plans(){
        return $this->hasMany(Plans::class);
    }
}

