<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id','title','descreption','image','quantity','price'];

    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
