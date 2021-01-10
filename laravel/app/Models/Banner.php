<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table='banners';
    protected $fillable = [
        'image',
        'type',
        'content',
        'desc',
        'status',
    ];

    public function owner(){
        return $this->belongsTo('User');
    }
}
