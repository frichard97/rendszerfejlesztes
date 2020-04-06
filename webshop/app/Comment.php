<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id','user_id','offer_id','message'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
    public function offer() {
        return $this->hasOne(Offer::class);
    }
}
