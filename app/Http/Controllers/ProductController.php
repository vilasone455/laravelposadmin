<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getAllProduct();
    }

    function getAllProduct(){
        $products = array();
        $pros =  Product::all();
        foreach ($pros as $pro) {
            array_push($products, $this->getProductAndSku($pro));
        }
        return $products;
    }

    function getProductAndSku($product){

        $p = $product;

        for ($skuIndex=0; $skuIndex < sizeof($p->sku) ; $skuIndex++) { 
            $sku = $p->sku;
            $inv = $sku[$skuIndex]->inventorys->where("outlet_id" , 1);
            $sku[$skuIndex]["inventorys"]= "";
        }

        return $p;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertproduct(Request $request)
    {
        $pros = $request->all();
        
        $p = new Product($pros);
        $p->save();

        $skudata = array_map(function($ps){return new ProductSku($ps);} , $pros['sku']);
        //php array to sku model 
        $p->sku()->saveMany($skudata);
        $skulist = $p->sku;

        for ($i=0; $i < sizeof($pros["sku"]); $i++) { 
            $inventortymodel = new Inventory($pros["sku"][$i]["inventory"]);
            $skulist[$i]->inventorys()->save($inventortymodel);
        }

        return Product::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = Product::find($id);
        return $this->getProductAndSku($pro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pro_update = $request["product"];
        $pro = Product::find($id);
        $pro->update($pro_update);
        $sku = $pro->sku;
        $sku->update($pro_update["sku"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $pro = Product::find($id);
        return $pro->delete();
    }
}
