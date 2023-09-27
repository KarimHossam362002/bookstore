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
        "price_after_discount",
        "quantity",
        "product_code",
        "available",
        "image",
        "category_id"
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function wishlists(){
        return $this->belongsToMany(Wishlist::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function faqs(){
        return $this->hasMany(Faq::class);
    }

}
