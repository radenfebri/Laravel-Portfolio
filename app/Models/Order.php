<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['order_id','name', 'email', 'alamat', 'status', 'message', 'tracking_no'];

    protected $hidden = [];
}
