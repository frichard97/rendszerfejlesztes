<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
            'product_id','end_date','visibility','currentprice'
    ];
    public function white_users()
    {
        return $this->belongsToMany(User::class,'offer_user_whitelist','offer_id','user_id');
    }
    public function wish_users(){
        return $this->belongsToMany(User::class,'offer_user_wishlist','offer_id','user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'offer_id','product_id');
    }
}
