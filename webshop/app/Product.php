<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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
    public function delete() {
        $image_path = public_path()."\\images\\".$this->image;
        File::delete($image_path);

        $this->categories()->detach($this->categories);
        
        return parent::delete();
    }
}
