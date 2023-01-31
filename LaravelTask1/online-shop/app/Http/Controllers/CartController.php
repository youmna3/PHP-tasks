<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    //
    function cart()
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
        return view('cart', compact('products', 'shipping', 'subTotal', 'total'));
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
    /*
    function remove(Request $request)
    {
    if (($request->has('id'))) {
    $id = $request->get('id');
    $ids = Session::get('ids', []);
    //unset($ids[$id]);
    array_splice($ids, $id, 1);
    //array_values($ids);
    Session::put('ids', $ids);
    return response()->json('removed');
    }
    }
    */


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