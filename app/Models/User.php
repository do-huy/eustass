<?php

namespace App\Models;

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
        'name', 'email', 'password', 'number' , 'day' , 'month' , 'year' , 'provider' , 'provider_id'
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

    public function roles()
    {
        return $this->belongsToMany(Role::class,UserRole::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function ProductLikes()
    {
        return $this->hasMany(ProductLike::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function toAdmin()
    {
        // dd($this->roles());
        if ($this->roles()->get()->count() > 0) {
            foreach($this->roles()->get() as $role){
                if ($role->name == 'admin' || $role->name == 'store') {
                    return true;
                }
            }
            return false;
        }
        return false;
    }
}
