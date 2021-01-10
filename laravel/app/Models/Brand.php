<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillable = [
        'name',
        'image',
        'desc',
        'status',
    ];

    public function owner(){
        return $this->belongsTo('User');
    }

    // In product model
    public function product(){
        return $this->hasMany('App\Models\Product','brand_id');
    }
}
