<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function admin()
    {

        return view('admin');
    }
// function categories()
// {
//     $categories = Category::all();
//     return view('admin', compact('categories'));
//     //return view('categories')->with('categories', Category::all());
// }
}