<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable =['question','answer','product_id'];
    use HasFactory;

    function product(){
        return $this->belongsTo(Product::class);
    }
}
