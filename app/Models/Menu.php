<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function get_category_bn()
    {
        return $this->hasMany(Category::Class,'menu_id');
    }

    public function get_category_en()
    {
        return $this->hasMany(Category::Class,'menu_id');
    }
}
