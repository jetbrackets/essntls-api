<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;

    protected $table = 'orders_logs';
    protected $fillable = [
        'action',
        'order_id',
        'driver_id',
        'customer_id'
    ];
}
