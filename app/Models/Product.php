<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'quantity',
        'weight',
        'price',
        'sale_price',
        'status',
        'featured',
        'brand_id'
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    // public function setNameAttribute($value)
    // {
    //     $attribute['name'] = $value;
    //     $attribute['slug'] = Str::slug($value);
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
