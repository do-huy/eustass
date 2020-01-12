<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function typeCategories()
    {
        return $this->hasMany(TypeCategory::class);
    }
    public function categoryMain()
    {
        return $this->belongsTo(CategoryMain::class);
    }
}
