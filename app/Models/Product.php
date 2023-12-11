<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function get_category()
    {
        return $this->belongsTo(Category::Class,'category_id');
    }

    public function get_attribute()
    {
        return $this->hasMany(ProductAttribute::Class,'product_id');
    }

    public function get_product_avatars()
    {
        return $this->hasMany(ProductAvatar::Class,'product_id');
    }
}
