<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'Img',
        'ProductCode',
        'ProductName',
        'Qty',
        'UnitPrice',
        'TotalPrice',
        '_id',
    ];

    // public function getRouteKeyName()
    // {
    //     return '_id';
    // }
}
