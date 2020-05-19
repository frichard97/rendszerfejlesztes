<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id', 'name', 'user_id', 'offer_id', 'comment', 'seen'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function offer() {
        return $this->hasOne(Offer::class, 'product_id', 'offer_id');
    }
}
