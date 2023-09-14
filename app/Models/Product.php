<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "author",
        "pages_num",
        "price",
        "discount",
        "quantity",
        "product_code"
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
