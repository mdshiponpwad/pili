<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function get_product()
    {
        return $this->belongsTo(Product::Class,'product_id');
    }
    
    public function get_user()
    {
        return $this->belongsTo(User::Class,'user_id');
    }
}
