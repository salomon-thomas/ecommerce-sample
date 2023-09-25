<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = "shipping_addresses";
    protected $fillable = ['user_id', 'order_id', 'first_name', 'last_name', 'city', 'postal_code', 'telephone'];
}
