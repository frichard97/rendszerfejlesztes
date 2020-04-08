<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description','price','quantity','categories','user_id','image'
    ];
    public function categories(){
        return $this->belongsToMany(Category::class,'product_category');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offer(){
        return $this->hasOne(Offer::class);
    }
}
