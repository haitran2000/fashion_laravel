<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';
    protected $fillable = [
        'name',
        'status',
    ];

    public function order()
    {
        return $this->hasMany('App\Models\Order','payment_id');
    }
}
