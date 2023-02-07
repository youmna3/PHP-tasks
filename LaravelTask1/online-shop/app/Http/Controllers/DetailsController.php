<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    function index($id = 2)
    {
        $product = Product::Find($id);
        $products = Product::all();
        return view('details', compact('products', 'product'));
    }
}