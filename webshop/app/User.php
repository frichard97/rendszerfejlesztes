<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
    public function profile(){
         return $this->hasOne(Profile::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function white_offers(){
        return $this->belongsToMany(Offer::class,'offer_user_whitelist','user_id','offer_id');
    }
    public function wish_offers(){
        return $this->belongsToMany(Offer::class,'offer_user_wishlist','user_id','offer_id');
    }
    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }
    public function IsAdmin(){
        if($this->role->name == "Admin"){
            return true;
        }
        return false;
    }
}
