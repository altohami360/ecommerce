<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['code' ,'name', 'frontend_type', 'is_filterable', 'is_required'];
    
    /**
     * @var array
     */
    protected $casts  = [
        'is_filterable' =>  'boolean',
        'is_required'   =>  'boolean',
    ];

    
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }
    
}
