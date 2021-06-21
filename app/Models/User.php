<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Account Status
    const statusApproved = 'approved';
    const statusBlocked = 'blocked';
    const statusPendding = 'pendding';

    //Account Type
    const typeDriver = 'driver';
    const typeCustomer = 'customer';
    const typeAdmin = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'is_active',
        'image',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

     /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentMethod(): HasOne
    {
        return $this->hasOne(PaymentMethod::class, 'user_id', 'id');
    }

    /**
     * Get all of the Orders for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

     /**
     * Get all of the customer Orders for the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function driverOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

}
