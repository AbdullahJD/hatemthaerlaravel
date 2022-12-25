<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';
    protected $fillable = ['name','image','comment','is_active','price'];
    protected $hidden = [];

    public function details() {
        return $this->hasOne(CustomerDetail::class, 'customer_id','id');
    }

    public function addresses() {
        return $this->hasMany(Address::class, 'customer_id');
    }

}
