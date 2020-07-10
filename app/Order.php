<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    function orderitems(){
        return $this->hasMany('App\OrderProduct');
    }

    function user(){
        return $this->hasOne("App\User" , "id" , "user_id");
    }


}
