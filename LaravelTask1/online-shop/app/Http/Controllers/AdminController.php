<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function admin()
    {
        return view('admin');
    }
    function categories()
    {
        return view('categories')->with('categories', Category::all());
    }
}