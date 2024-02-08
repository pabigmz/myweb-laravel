<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'cost',
        'price',
        'quantity',
        'image',
        'product_types_id'
    ];
    
    public function product_type(){
        return $this->belongsTo(products::class);
    }

}
