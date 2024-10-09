<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'phone', 'password', 'role','verification_code', 'phone_verified_at',
    ];

    protected $dates = ['phone_verified_at'];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDirection()
    {
        return $this->role === 'direction';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }

    public function isAgence()
    {
        return $this->role === 'agence';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function routeNotificationForSms()
    {
        return $this->phone;
    }

    public function reservationOmras()
    {
        return $this->hasMany(ReservationOmra::class, 'user_id');
    }
   // User.php
public function reservations()
{
    return $this->hasMany(ReservationOmra::class);
}

public function omras()
{
    return $this->hasManyThrough(Omra::class, ReservationOmra::class, 'user_id', 'id', 'id', 'omraID');
}

}
