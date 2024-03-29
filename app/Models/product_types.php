<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_types extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_types_name'
    ];

    public function product(){
        return $this->hasMany(products::class);
    }
   
}
