<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{

    public function inventorys(){
        return $this->hasMany("App\Inventory");
    }

    public function employees(){
        return $this->hasMany("App\Employee");
    }

    public static function getProducts($id){
        $inventorys = Outlet::getInventorys($id);
        $pros = array();
        foreach ($inventorys as $inventory) {
            $sku = $inventory->sku;
            $pro = $sku->product;
            $pro["sku"] = $sku;
            array_push($pros , $pro);
        }
        print_r($pros);
    }

    public static function getPro($id){
        $product = Product::find($id);
        for ($skuIndex=0; $skuIndex < sizeof($product->sku) ; $skuIndex++) { 
            $sku = $product->sku;
            $inventorys = $sku[$skuIndex]->inventorys;

            if(sizeof($inventorys) > 0){

                $filterBy = 1; // or Finance etc.

                $inventory = $inventorys->where("outlet_id" , $filterBy);
                print_r($inventory);
                $product["sku"][$skuIndex]["inventory"] = $inv;
            }
        }
    }

    public static function getInventorys($id){
        return Outlet::find($id)->inventorys;
    }

    public static function getAllProducts($id)
    {   
        $inventorys = Outlet::find($id)->inventorys;
        $products = array();


        foreach ($inventorys as $inv) {
           $prosku = $inv->productsku;
           $pro = $prosku->Product;
           //array_search($pro->id array_column($products, 'id'));
           //$pro["skus"] = 
        }

    }

}
