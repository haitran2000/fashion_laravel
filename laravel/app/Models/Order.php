<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'payment_id',
        'total',
        'status'
    ];

    public function order_detail()
    {
        return $this->hasMany('App\Models\Order_Detail','order_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function payment(){
        return $this->belongsTo('App\Models\Payment', 'payment_id', 'id');
    }
}
