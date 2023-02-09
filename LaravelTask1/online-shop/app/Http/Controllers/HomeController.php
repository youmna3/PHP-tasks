<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Size;
use App\Models\color;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $users = User::all();


        return view('index', compact('categories', 'products', 'users'));
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


    function add_product(Request $request)
    {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            array_push($ids, $request->get('id'));
            Session::put('ids', $ids);
            return response()->json(count($ids));
        }
        return abort(404);
    }

    function addToFavorite(Request $request)
    {

        $ids = Session::get('favourites', []);
        if (!array_search($request->get('id'), $ids)) {
            array_push($ids, $request->get('id'));
            Session::put('favourites', $ids);
            return response()->json(count($ids));
        }
    }
    function checkOut()
    {
        $products = Cart::cartLines();
        $subTotal = Cart::subTotal();
        $shipping = Cart::shipping();
        $total = Cart::total();
        return view('checkout', compact('products', 'shipping', 'subTotal', 'total'));
    }
    function post_order(Request $request)
    {
        $products = Cart::cartLines();
        $subTotal = Cart::subTotal();
        $shipping = Cart::shipping();
        $total = Cart::total();
        $order = new Order;
        $order->fill($request->post());
        $order->total = $total;
        $order->shipping = $shipping;
        $order->sub_total = $subTotal;
        $order->user_id = Auth::id();
        $order->save();
        foreach ($products as $product) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product->id;
            $order_detail->quantity = $product->quantity;
            $order_detail->price = $product->getPrice();
            $order_detail->save();
        }
        Session::forget('ids');
        return Redirect::back()->with('success', 'Thank you for you Order, Order Number:4523sd45f');


    }


}