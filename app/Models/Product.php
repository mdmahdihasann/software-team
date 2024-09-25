<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'product_title',
        'product_description',
        'product_reviews',
        'product_quantity',
        'discount_price',
        'price',
        'image',
        'product_tag',
        'status'
    ];
    public function category(){
        return $this->BelongsTo(category::class);
    }
}
