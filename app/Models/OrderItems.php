<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable = ['product_id', 'product_variant_id', 'order_id', 'units', 'price', 'total'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariants::class, 'product_variant_id');
    }
}
