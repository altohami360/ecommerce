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
        'attribute_value_id'
    ];
    
    protected $casts = [
        'product_id' => 'integer',
        'attribute_id' => 'integer',
        'attribute_value_id' => 'integer'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }

}
