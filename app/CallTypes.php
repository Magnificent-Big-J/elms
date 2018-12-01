<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallTypes extends Model
{
    protected $fillable = ['description'];

    public function calls(){
        return $this->hasMany(Calls::class);
    }
}
