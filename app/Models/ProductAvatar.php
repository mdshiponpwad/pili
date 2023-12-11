<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAvatar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function get_attribute()
    {
        return $this->belongsTo(ProductAttribute::Class,'attribute_id');
    }
}
