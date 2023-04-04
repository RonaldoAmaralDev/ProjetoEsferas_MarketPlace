<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
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

    protected $table = 'users';

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

    public function player()
    {        
        return $this->hasOne(Player::class, 'user_id', 'id');
    }

    static function friendlist()
    {
        $data = [
            [
                'id' => 7444,
                'name' => 'jonas bravo',
                'status' => 'offline',
            ],
            [
                'id' => 7244,
                'name' => 'copo de vidro',
                'status' => 'online'
            ],
            [
                'id' => 1274,
                'name' => 'cereja do bolo',
                'status' => 'estudando'
            ]
        ];

        return $data;
    }

    public function student()
    {
        return $this->hasOne(UserStudent::class, 'user_id', 'id');
    }
}
