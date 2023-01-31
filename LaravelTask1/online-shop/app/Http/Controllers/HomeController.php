<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
    function shop(Request $request)
    {

        $query = Product::query();
        //$request ->all() get all the values inside the req func
        $inputs = $request->all();
        if (isset($inputs['keywords'])) {
            $query = $query->where('name', 'like', "%" . $inputs['keywords'] . "%");
        }
        if (isset($inputs['color'])) {
            if (!in_array('-1', $inputs['color'])) {

                $query = $query->whereIn('color_id', $inputs['color']);
            }
        }
        if (isset($inputs['size'])) {
            if (!in_array('-1', $inputs['size'])) {
                $query = $query->whereIn('size_id', $inputs['size']);
            }
        }
        if ($request->has('category_id')) {
            $query = $query->where('category_id', $request->get('category_id'));
        }
        if ($request->has('price')) {
            if (!in_array('-1', $inputs['price'])) {
                $query = $query->where(function ($q) use ($inputs) {
                    foreach ($inputs['price'] as $price) {
                        $q = $q->orWhereBetween('price', [$price, $price + 100]);
                    }
                });
            }
        }

        $products = $query->paginate(6);
        $sizes = Size::all();
        $colors = Color::all();
        return view('shop')->with(compact('products', 'colors', 'sizes'));
    }


    //  function cart()
//     {     
//         $products = [];
//         $shipping=0;
//         $subTotal=0;
//         $total=0;
//         $ids = session()->get('ids', []);
//         $ids = array_count_values($ids);
//         foreach($ids as $id=>$quantity){
//             $product= Product::findOrFail($id);
//             $product['quantity'] = $quantity;
//             $subTotal += $product['quantity'] * $product->getPrice();
//             $shipping += $quantity *10;
//             $total = $subTotal +$shipping;
//             array_push($products, $product);
//         }
//         return view('cart',compact('products','shipping','subTotal','total'));
//     }

    function add_product(Request $request)
    {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            array_push($ids, $request->get('id'));
            Session::put('ids', $ids);
            return response()->json('Data addedd successfully');
        }
        return abort(404);
    }

    function checkOut()
    {
        $products = [];
        $shipping = 0;
        $subTotal = 0;
        $total = 0;
        $ids = session()->get('ids', []);
        $ids = array_count_values($ids);
        foreach ($ids as $id => $quantity) {
            $product = Product::findOrFail($id);
            $product['quantity'] = $quantity;
            $subTotal += $product['quantity'] * $product->getPrice();
            $shipping += $quantity * 10;
            $total = $subTotal + $shipping;
            array_push($products, $product);
        }
        return view('checkout', compact('products', 'shipping', 'subTotal', 'total'));


    }

}