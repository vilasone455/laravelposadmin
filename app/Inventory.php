<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable  = ['product_sku_id' ,'qty' , 'outlet_id'];

    public $timestamps = false;

    public function sku(){
        return $this->hasOne("App\ProductSku" , "id" , "product_sku_id");
    }

}
