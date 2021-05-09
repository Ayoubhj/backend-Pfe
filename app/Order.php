<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["user_id","firstname","lastname","adresse","city","codepostal","telephone","product_id","size","quantity","status"];

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
