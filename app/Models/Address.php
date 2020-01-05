<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // protected $fillable = [''];
    protected $appends = ['full'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFullAttribute()
    {
        $fullAddress = $this->attributes['description'].', '.
                        $this->ward->name.', '.
                        $this->district->name.', '.
                        $this->province->name.', Việt Nam';
        return $fullAddress;
    }
}
