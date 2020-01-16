<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMain extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function typeCategories()
    {
        return $this->hasManyThrough(TypeCategory::class,Category::class);
    }

    // mới làm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
