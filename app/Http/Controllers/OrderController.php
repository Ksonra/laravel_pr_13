<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class OrderController extends Controller
{
    public function addCookie($id = null, Request $request)
    {
        $order = $_COOKIE['order'] ?? null;
        $keys_id = $id . ':1';
        if ($order) {
            $keys = explode(',', $order); //14:1, 10:1, 12:3 (номер товара и количество)
            if (in_array($keys_id, $keys)) {
                return redirect()->back()->withErrors(['такой товар уже есть в корзине']);
            } else {
                $keys[] = $keys_id;
                $order = implode(',', $keys);
            }
        } else {
            $order = $id . ':1';
        }
        setCookie('order', $order, time() + 3600, '/');
        return redirect()->back();
    }
    public function cart()
    {
        $order_arr = [];
        $products = [];
        $itogo = 0;
        if (isset($_COOKIE['order'])) {
            $order_arr = explode(',', $_COOKIE['order']);
        }
        foreach ($order_arr as $value) {
            if ($value)
                $prod_ids = explode(':', $value);
            $prod = Product::find($prod_ids[0]);
            $itogo += (float) $prod->price - (($prod->price * $prod->discount) / 100);
            $products[$prod_ids[0]] = $prod;
        }

        return view('cart', compact('products', 'itogo'));
    }
    public function cartDelete(Product $product)
    {
        if (isset($_COOKIE['order'])) {
            $order_new = [];
            $order_arr = explode(',', $_COOKIE['order']);
            foreach ($order_arr as $keys) {
                $key_arr = explode(':', $keys);
                if ($key_arr[0] != $product->id) {
                    $order_new[$key_arr[0]] = $keys;
                }
            }
            $order = implode(',', $order_new);
            setcookie('order', $order, time() + 3600, '/');
        }
        return redirect()->back();
    }

    public function formOrder(Request $request)
    {
        $order_req = $request->all();
        // abort_if(!optional($order_req)->first(), 418, 'Error_request');
        $prod_arr = [];
        $prod_count = [];
        foreach ($order_req as $key => $value) {
            $key_ids = explode('_', $key);
            $prod_arr[$key_ids[1]] = Product::find($key_ids[1]);
            $prod_count[$key_ids[1]] = $value;
        }
        return view('form_order', compact ('prod_arr', 'prod_count'));
    }
}
