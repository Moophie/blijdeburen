<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device_key',
        'profile_img',
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

    public function things()
    {
        return $this->hasMany(Thing::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }


    public function distanceFromUser($geolat2, $geolng2)
    {
        $theta = $this->geolng - $geolng2;
        $distance = (sin(deg2rad($this->geolat)) * sin(deg2rad($geolat2))) + (cos(deg2rad($this->geolat)) * cos(deg2rad($geolat2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = ($distance * 60 * 1.1515) * 1.609344;

        return (round($distance, 2));
    }
}
