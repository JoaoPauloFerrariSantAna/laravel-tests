<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/products", function(Request $req) {
    $product = new Products();

    $pname = $req->input("pname", ' ');
    $pdesc = $req->input("pdesc", ' ');
    $pprice = $req->input("pprice", 0.0);

    if(is_null($pname) || is_null($pdesc) || is_null($pprice)) {
        return response()->json(["status" => 404, "error" => "could not insert product"]);
    }

    $product->product_name = $pname;
    $product->product_description = $pdesc;
    $product->product_price = $pprice;
    $product->save();
    
    return response()->json($product);
});

Route::post("/categories", function(Request $req) {
    $category = new Categories();
    $cname = $req->input("cname", ' ');
    $cdesc = $req->input("cdesc", ' ');

    if(is_null($cname) || is_null($cdesc)) {
        return response()->json(["status" => 404, "error" => "could not insert product"]);
    }

    $category->category_name = $cname;
    $category->category_desc = $cdesc;
    $category->save();

    return response()->json($category);
});

Route::get("/products", function() {
    $all_products = Products::all();

    return response()->json($all_products);
});

Route::get("/categories", function() {
    $all_categories = Categories::all();

    return response()->json($all_categories);
});

Route::get("/product/{id}", function(Request $req, int $id) {
    $data = Products::find($id);

    if(is_null($id) || empty($data)) {
        return response()->json(["status" => 404, "error" => "could not find product"]);
    }

    return response()->json($data);
});

Route::get("/categories/{id}", function(Request $req, int $id) {
    $data = Categories::find($id);

    if(is_null($id) || empty($data)) {
        return response()->json(["status" => 404, "error" => "could not find category"]);
    }

    return response()->json($data);
});

Route::patch('/products/{id}', function (Request $req, int $id) {
    $product = Products::find($id);
    
    if(is_null($req->input('pname'))) {
        return response()->json(["status" => 404, "error" => "could not update product name"]);
    } else {
        $product->product_name = $req->input('pname');
    }

    if(is_null($req->input("pdesc"))) {
        return response()->json(["status" => 404, "error" => "could not update product description"]);
    } else {
        $product->product_description = $req->input('pdesc');
    }

    $product->save();
    return response()->json($product);
});

Route::patch("/categories/{id}", function(Request $req, int $id) {
    $category = Categories::find($id);

    if(is_null($req->input("cname"))) {
        return response()->json(["status" => 404, "error" => "could not update category name"]);
    } else {
        $category->category_name = $req->input("cname");
    }

    if(is_null($req->input("cdesc"))) {
        return response()->json(["status" => 404, "error" => "could not update category description"]);
    } else {
        $category->category_desc = $req->input("cdesc");
    }

    $category->save();

    return response()->json($category);
});

Route::delete("/products/{id}", function(int $id) {
    $product = Product::find($id);
    $product->delete();
    return response()->json($product);
});

Route::delete("/categories/{id}", function(int $id) {
    $category = Categories::find($id);
    $category->delete();

    return response()->json($category);
});

Route::get("/enterprises/", function() {
    $enterprises = Enterprise::all();

    return response()->json($enterprises);
});

Route::get("/enterprises/{id}", function(int $id) {
    $enterprise = Enterprise::find($id);

    return response()->json($enterprise);
});

Route::post("/enterprises/", function(Request $req) {
    $enterprise = new Enterprise();

    $etrade_name = $req->input("etrade_name", ' ');
    $ecorp_reason = $req->input("ecorp_reason", ' ');
    $ecnpj = $req->input("ecnpj", ' ');

    $enterprise->trade_name = $etrade_name;
    $enterprise->corporate_reason = $ecorp_reason;
    $enterprise->cnpj = $ecnpj;

    $enterprise->save();

    return response()->json($enterprise);
});

Route::delete("/enterprises/{id}", function(int $id) {
    $enterprise = Enterprise::find($id);
    $enterprise->delete();
    return response()->json($enterprise);
});