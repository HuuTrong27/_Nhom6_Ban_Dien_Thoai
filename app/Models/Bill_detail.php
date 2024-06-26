<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;

    protected $table = "bill_detail";
    public function product(){
    	return $this->belongsTo(Product::Class,'id_products','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
