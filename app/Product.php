<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable  = ['pro_name' ,'pro_price' , 'pro_desc' , 
    'pro_img' , 'brand_id' , 'categorie_id' , 'tax_id'];

    public $timestamps = false;

    //
    function tax()
    {
        return $this->hasOne("App\Tax" , "id" , "tax_id");
    }

    public static function test2(){
        $d = array(
            "sku_name" => "Mediam",
            "product_id" => 1
        );
       $s =  new ProductSku($d);
       echo($s->sku_name);
    }

    public static function updatepro($id){
        
        $pros = array(
            "pro_name" => "SodaRock",
            "pro_price" => 6000,
            "pro_desc" => "...",
            "pro_img" => "d.png",
            "brand_id" => 1 ,
            "categorie_id" => 1 ,
            "tax_id" => 1,
            "sku" => array(
                array("id" => 3 ,"sku_name" => "Normals"),
                array("id" => 4 , "sku_name" => "Big")
            )
          );

          $p = Product::find($id);
          $p->update($pros);

          for ($i=0; $i < sizeof($pros["sku"]) ; $i++) { 
            $skuid = $pros["sku"][$i]["id"];
            $skuupdate = ProductSku::find($skuid);
            $skuupdate->update($pros["sku"][$i]);
          }

    }

    public static function testqty(){

        $pros = array(
            "pro_name" => "Finzza",
            "pro_price" => 50000,
            "pro_desc" => "...",
            "pro_img" => "d.png",
            "brand_id" => 1 ,
            "categorie_id" => 1 ,
            "tax_id" => 1,
            "sku" => array(
                array("sku_name" => "Normal" , 
                "inventory" => array(
                    "qty" => 12 ,
                    "outlet_id" => 1 
                )
                ),
                array("sku_name" => "Big" , 
                "inventory" => array(
                    "qty" => 2 ,
                    "outlet_id" => 1 
                ))
            )
          );

          $invdata = array(
            array(
                "qty" => 12 ,
                "outlet_id" => 1 
            ),array(
                "qty" => 12 ,
                "outlet_id" => 1 
            )
            );
         
          $p = Product::find(16);
          $skulist = $p->sku;

          for ($i=0; $i < sizeof($skulist); $i++) { 
              $inventortymodel = new Inventory($invdata[$i]);
              $skulist[$i]->inventorys()->save($inventortymodel);
          }

    }

    public static function test(){

        $pros = array(
            "pro_name" => "Cococo",
            "pro_price" => 50000,
            "pro_desc" => "...",
            "pro_img" => "d.png",
            "brand_id" => 1 ,
            "categorie_id" => 1 ,
            "tax_id" => 1,
            "sku" => array(
                array("sku_name" => "Normal" , 
                "inventory" => array(
                    "qty" => 12 ,
                    "outlet_id" => 1 
                )
                ),
                array("sku_name" => "Big" , 
                "inventory" => array(
                    "qty" => 5 ,
                    "outlet_id" => 1 
                ))
            )
          );
         
          $p = new Product($pros);
          $p->save();

          $skudata = array_map(function($ps){return new ProductSku($ps);} , $pros['sku']);

          $p->sku()->saveMany($skudata);
          $skulist = $p->sku;

          for ($i=0; $i < sizeof($pros["sku"]); $i++) { 
              $inventortymodel = new Inventory($pros["sku"][$i]["inventory"]);
              $skulist[$i]->inventorys()->save($inventortymodel);
          }

    }

    public static function t2(){
        $invdata = array(
            "qty" => 12 ,
            "outlet_id" => 1 
        );
        $sid = 3;
        $sku = ProductSku::find($sid);

        $sku->inventory->save(new Inventory($invdata));
    }


    function getTax(){
        return $this->tax->tax_value;
    }

    function sku(){
        return $this->hasMany("App\ProductSku");
    }

}
