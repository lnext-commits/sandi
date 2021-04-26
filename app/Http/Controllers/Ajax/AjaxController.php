<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getJson (Request $request)
    {
        if ($request->ajax()) {
           $product = Product::whereId($request->id)->get();
           return json_encode($product, JSON_UNESCAPED_UNICODE);
        }
    }
}
