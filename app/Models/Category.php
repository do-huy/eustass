<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function type_categories()
    {
        return $this->hasMany(TypeCategory::class);
    }
}
