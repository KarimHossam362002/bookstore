<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationContact extends Model
{
    use HasFactory;
    protected $fillable=['email','phone','technical_support_address','ongoing_support_address'];
}
