<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description','price','quantity','categories','user_id'
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function offer(){
        return $this->hasOne(Offer::class);
    }
}
