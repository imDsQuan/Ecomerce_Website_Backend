<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminUser extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='admin_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'password',
=======
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name'
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
=======

>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

<<<<<<< HEAD
=======
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    public function getJWTCustomClaims()
    {
        return [];
    }

<<<<<<< HEAD
    public function setPasswordAttribute($value){
=======
    public function setPasswordAttribute($value)
    {
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
        $this->attributes['password'] = bcrypt($value);
    }
}
