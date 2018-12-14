<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document_types extends Model
{
    protected $fillable = ['description'];

    public function documents(){
        return $this->hasMany(documents::class);
    }
}
