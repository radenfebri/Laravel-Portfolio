<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['order_id','name', 'email', 'alamat', 'status', 'message', 'tracking_no', 'total_price'];

    protected $hidden = [];

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
