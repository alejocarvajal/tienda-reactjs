<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Tarjeta de credito asociada al usuario
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function credit_card()
    {
        return $this->belongsTo(CreditCard::class);
    }

    /**
     * Orden asociada al usuario
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Order()
    {
        return $this->hasOne(Order::class);
    }
}
