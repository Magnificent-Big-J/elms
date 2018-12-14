<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected  $fillable = ['document_type_id','user_id','date_uploaded','file_path','plan_id'];

    public function document_type(){
        return $this->belongsTo(document_types::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bills(){
        return $this->hasMany(Bills::class);
    }
    public function plan(){
        return $this->belongsTo(Plans::class);
    }
}
