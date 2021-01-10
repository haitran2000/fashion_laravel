<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
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
        return $this->hasMany('App\Models\Product','category_id');
    }
}
