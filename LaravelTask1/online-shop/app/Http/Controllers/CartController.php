<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    //
    function cart()
    {

        $products = Cart::cartLines();
        $subTotal = Cart::subTotal();
        $shipping = Cart::shipping();
        $total = Cart::total();
        return view('cart', compact('products', 'subTotal', 'shipping', 'total'));
    }
    function incQuan(Request $request)
    {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            array_push($ids, $request->get('id'));
            Session::put('ids', $ids);
            return response()->json('quntity increased');
        }
        return abort(404);
    }

    function decQuan(Request $request)
    {

        if ($request->has('id')) {
            $ids = Session::get('ids', []);

            $key = array_search($request->get('id'), $ids);

            unset($ids[$key]);

            array_values($ids);
            Session::put('ids', $ids);

            return response()->json('quntity dec');
        }
        return abort(404);
    }

    function delete(Request $request)
    {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            $newCartLines = [];
            foreach ($ids as $id) {
                if ($id != $request->get('id')) {
                    array_push($newCartLines, $id);
                }
            }
            Session::put('ids', $newCartLines);
            return response()->json('delet product');
        }
        return abort(404);

    }

}