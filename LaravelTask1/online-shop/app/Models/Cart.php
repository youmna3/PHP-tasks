<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public static function cartLines()
    {
        $products = [];
        $ids = session()->get('ids', []);
        $ids = array_count_values($ids);
        foreach ($ids as $id => $quantity) {
            $product = Product::findOrFail($id);
            $product['quantity'] = $quantity;

            array_push($products, $product);
        }
        return $products;
    }
    public static function subTotal()
    {
        $subTotal = 0;
        $products = Cart::cartLines();
        foreach ($products as $product) {
            $subTotal += $product['quantity'] * $product->getPrice();
        }
        return $subTotal;
    }
    public static function shipping()
    {
        $shipping = 0;
        $products = Cart::cartLines();
        foreach ($products as $product) {

            $shipping += $product['quantity'] * 10;
        }
        return $shipping;
    }
    public static function total()
    {
        $total = 0;
        $subTotal = Cart::subTotal();
        $shipping = Cart::shipping();
        //$products = Cart::cartLines();
        $total = $subTotal + $shipping;

        return $total;
    }

}