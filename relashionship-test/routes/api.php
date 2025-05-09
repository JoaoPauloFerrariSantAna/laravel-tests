<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Enterprise;
use App\Models\Product;

Route::post("/enterprise", function(Request $req) {
    $enterprise = new Enterprise();

    $enterprise->trade_name = $req->input("tname");
    $enterprise->cnpj = $req->input("cnpj");
    $enterprise->save();

    return response()->json($enterprise);
});

Route::post("/product", function(Request $req) {
    $product = new Product();
    $enterprise = NULL;

    $product->name = $req->input("pname");
    $product->price = $req->input("pprice");
    $product->quantity = $req->input("pquantity");
    $enterprise_id = $req->input("eid");
    
    $enterprise = Enterprise::find($enterprise_id);

    $product->enterprise()->associate($enterprise);

    $product->save();

    return response()->json($product);
});