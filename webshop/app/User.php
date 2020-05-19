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
        'email', 'password','role_id',
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
    public function offers(){
        return $this->hasManyThrough(Offer::class,Product::class,'user_id','product_id');
    }
    public function IsAdmin(){
        if($this->role->name == "Admin"){
            return true;
        }
        return false;
    }
    public function notifications() {
        return $this->hasMany(Notification::class);
    }
    public function unseen_num_of_notifs() {
        $count = 0;
        $notifs = $this->notifications;
        foreach($notifs as $n){
            if (!$n->seen) {
                $count+=1;
            }
        }
        return $count;
    }
}
