<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";
   
    
    public function bill_detail(){
    	return $this->hasMany(Bill_detail::Class,'id_bill','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
