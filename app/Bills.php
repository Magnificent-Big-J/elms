<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = ['user_id','amount','file','status'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
