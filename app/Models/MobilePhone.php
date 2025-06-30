<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilePhone extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'phone_name',
        'price',
        'image1',
        'image2',
        'image3',
        'description',
        'stock_quantity',
        'status',
    ];
}
