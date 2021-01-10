<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table='orders_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'image',
        'price',
        'quantity'
    ];
    public function order(){
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
