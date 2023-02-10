<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DetailsController extends Controller
{
    //
    function index($id = 2)
    {
        $product = Product::Find($id);
        $products = Product::all();
        $reviews = Review::all();
        return view('details', compact('products', 'product', 'reviews'));
    }
    function postReview(Request $request, $id = 2)
    {

        $review = new Review;
        $review->fill($request->post());


        $review->user_id = auth()->user()->id;
        $review->product_id = $request->id;
        //$review->rate = 3;
        $review->save();
        $product = Product::Find($id);
        $product['rating_count'] = $product['rating_count'] + 1;
        $product['rating'] = ($product['rating'] * $product['rating_count'] + $review['rate']) / ($product['rating_count'] + 1);

        $product->save();

        return Redirect::back();
    }
}