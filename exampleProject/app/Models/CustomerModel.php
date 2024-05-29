<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblcustomer";
    protected $primaryKey = 'id';

    protected $fillable = [
        'cid', 'cname', 'cemail', 'address', 'phone'
    ];

    public function hasOrder(){
        return $this->hasMany(OrderModel::class,'oid','cid');
    }
}
