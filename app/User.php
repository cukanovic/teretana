<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const TYPE_USER = 'user';
    const TYPE_TRAINER = 'trainer';
    const TYPE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function setPasswordAttribute(string $plain)
    {
        $this->attributes['password'] = bcrypt($plain);
    }

    public function scopeCustomer($query)
    {
        return $query->where('type', self::TYPE_USER);
    }

    public function scopeTrainer($query)
    {
        return $query->where('type', self::TYPE_TRAINER);
    }

    public function scopeAdmin($query)
    {
        return $query->where('type', self::TYPE_ADMIN);
    }
}
