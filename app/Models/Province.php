<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function districts()
    {
        return $this->hasMany(District::class);
    }
    public function wards()
    {
        return $this->hasManyThrough(Ward::class,District::class);
    }
}
