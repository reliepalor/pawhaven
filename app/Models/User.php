<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
       'name',
        'email',
        'password',
        'role',
        'street_address',
        'city',
        'province',
        'postal_code',
        'country',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function shippingLocation()
{
    return $this->belongsTo(ShippingLocation::class);
}
/**
 * Get the orders for the user.
 */
public function orders()
{
    return $this->hasMany(Order::class);
}


}
