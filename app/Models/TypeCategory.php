<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
