<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['name','motivation','suggestion_date','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
