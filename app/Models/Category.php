<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function get_product()
    {
        return $this->hasMany(Product::Class,'category_id');
    }

    // public function get_product_en()
    // {
    //     return $this->hasMany(Product::Class,'category_en_id');
    // }

    public function get_menu()
    {
        return $this->belongsTo(Menu::Class,'menu_id');
    }
}
