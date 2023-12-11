<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function get_product()
    {
        return $this->belongsTo(Product::Class,'product_id');
    }

    public function get_product_avatar()
    {
        return $this->hasMany(ProductAvatar::Class,'attribute_id');
    }
}
