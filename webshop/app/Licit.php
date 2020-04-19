<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licit extends Model
{
    protected $fillable = [
        'id','user_id','offer_id','price'
    ];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function offer() {
        return $this->hasOne(Offer::class);
    }
}
