<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function billDetails()
    {
        return $this->hasMany(BillDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
