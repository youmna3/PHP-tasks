<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function admin()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
    // function categories()
// {
//     $categories = Category::all();
//     return view('admin', compact('categories'));
//     //return view('categories')->with('categories', Category::all());
// }
    function users()
    {
        $users = User::paginate(2);
        return view('admin.user', compact('users'));
    }

}