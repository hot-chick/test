<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $found = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'product_id' => $productId,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $quantity
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }
}
