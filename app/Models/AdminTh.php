<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTh extends Model
{
    use HasFactory;
    protected $table = "admins_th";
    protected $fillable = ['name', 'email', 'created_at', 'updated_at'];
}
