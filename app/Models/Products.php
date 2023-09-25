<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['categories_id', 'name', 'description'];
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }
    public function variantFirstWithStock()
    {
        return $this->variants()->where('stock', '>', 0)->first();
    }
    public function varianttWithStock()
    {
        return $this->variants()->where('stock', '>', 0);
    }
}
