<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestockOrder extends Model
{

    const orderDone = 'completed';
    const orderPending = 'pending';
    const orderShipping = 'shipping';
    const orderAccepted = 'accepted';
    const orderCanceled = 'canceled';


    use HasFactory;

     /**
     * Get all of the comments for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(RestockOrderItem::class, 'restock_order_id', 'id');
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    /**
     * Get the user that owns the PaymentMethod
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
}
