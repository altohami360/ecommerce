<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillalbe = [
        'quantity',
        'price',
        'product_id',
        'attribute_id',

        // 'attribute_value_id'
    ];
    
    protected $casts = [
        'product_id' => 'integer',
        'attribute_id' => 'integer',
        'attribute_value_id' => 'integer'
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class);
    }

}
