<?php
require_once(BASE_PATH . 'dal/dal.php');
function addProductToCart($product)
{
    $cart = getCart();
    $found = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $product['id']) {
            $cart[$i]['quantity'] += 1;
            $found = true;
        }
    }
    if (!$found) {
        array_push($cart, ['product' => $product, 'quantity' => 1]);
    }
    $_SESSION['cart'] = $cart;
}
function decQun($product)
{
    $cart = getCart();
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $product['id']) {
            $cart[$i]['quantity']--;
        }
    }
    $_SESSION['cart'] = $cart;
}
function remove($product)
{
    $cart = getCart();
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $product['id']) {
            unset($cart[$i]);
        }
    }
    $_SESSION['cart'] = $cart;
}
function getCart()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    return $cart;
}