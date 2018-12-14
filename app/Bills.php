<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = ['user_id','document_id','bill_month','amount','status'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeMyBills($query){
        return $query->whereUserId(auth()->user()->id);

    }
    public function document(){
        return $this->belongsTo(document::class);
    }
}
