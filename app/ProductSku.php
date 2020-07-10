<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    //

    protected $fillable  = ["product_id" , "sku_name"];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function inventorys()
    {
        return $this->hasMany('App\Inventory');
    }
}
