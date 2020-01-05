<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BillDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }
}
