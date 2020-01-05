<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Cart extends Model
{
    protected $appends = ['total'];

    public function getTotalAttribute()
    {
        return $this->price*$this->amount;
    }
}
