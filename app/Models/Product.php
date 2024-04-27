<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "description",
        "small",
        "medium",
        "large",
        "extra_large",
        "category_id",
        "user_id",
        "menu_id"
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }


}
