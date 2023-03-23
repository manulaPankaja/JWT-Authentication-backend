<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);

        //This is a PHP code snippet that defines a mutator method for the password attribute of a model in Laravel, which allows you to modify the value of the attribute before it is saved to the database.

        // The setPasswordAttribute() method takes a single argument $value, which represents the new value of the password attribute.

        // Inside the method, the $value is passed through the bcrypt() function, which hashes the password value using the bcrypt algorithm. The resulting hash value is then assigned to the password attribute using the $this->attributes property.

        // By using this mutator method, you can ensure that the password is always stored securely in the database as a hashed value, which helps to protect against unauthorized access to user passwords in case of a data breach.
    }

    //setPasswordAttribute() mutator method will be called automatically, and the password value will be hashed before it is saved to the users table in the database.
}
