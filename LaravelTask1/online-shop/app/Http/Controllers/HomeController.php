<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        // all()select all from the database and return data in the form of array 
        //$categories = Category::all();
        //dd($categories);
        //name (used inside the view) and value
        return view('index')->with(['categories' => Category::all(), 'products' => Product::all()]);
    }
    function shop()
    {
        return view('shop');
    }
}