<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budgets extends Model
{
    protected $fillable = ['year','allocated_amount','used_amount','description'];

}
