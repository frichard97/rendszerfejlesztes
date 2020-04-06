<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'user_id';
    protected $fillable = [
    'user_id','firstname', 'lastname', 'postcode','place','street','number'
    ];
    public function getFullName(){
        return $this->lastname." ".$this->firstname;
    }
    public function getFullAddress(){
        return $this->postcode.", ".$this->place." ".$this->street." ".$this->number;
    }
}
