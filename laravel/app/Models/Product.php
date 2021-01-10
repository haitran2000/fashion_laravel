<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'desc',
        'content',
        'price',
        'image',
        'status'
    ];
    /**
     * @var mixed
     */

    public function order_detail()
    {
        return $this->hasMany('App\Models\Order_Details','product_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
