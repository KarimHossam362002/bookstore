<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        "total","status"
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
