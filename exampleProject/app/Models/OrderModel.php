<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tbldetail";

    public function hasOrderDetail(){
        return $this->hasMany(OrderDetailModel::class,'odid','oid');
    }

    public function belongtoCustomer(){
        return $this->belongsTo(CustomerModel::class,'cid','oid');
    }
}
