<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $primaryKey = 'user_cart_id';
    
    protected $fillable = ['user_id', 'product_id'];
    use HasFactory;
}
