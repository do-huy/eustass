<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type_category()
    {
        return $this->belongsTo(TypeCategory::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function BillDetails()
    {
        return $this->hasMany(BillDetail::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    // vừa sửa chữa
    public function typeCategories()
    {
        return $this->hasManyThrough(TypeCategory::class,Category::class,CategoryMain::class);
    }

    // mới làm
    public function CategoryMain()
    {
        return $this->belongsTo(CategoryMain::class);
    }


}
