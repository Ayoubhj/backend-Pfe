<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="Order";

    protected $fillable = ["user_id","firstname","lastname","Adresse","City","Codepostal","Telphone"];
}
