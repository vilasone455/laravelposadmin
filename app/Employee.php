<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    public function outlet(){
        return $this->hasOne("App\Outlet" , "id" ,"outlet_id");
    }

}
