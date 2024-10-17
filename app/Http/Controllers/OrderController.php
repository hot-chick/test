<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return view('orders.checkout', compact('cart', 'totalPrice'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Ваша корзина пуста');
        }

        $order = Order::create([
            'products' => json_encode($cart),
            'total_price' => array_sum(array_column($cart, 'price'))
        ]);

        session()->forget('cart');
        return redirect('/')->with('success', 'Заказ успешно сформирован');
    }

    public function index()
    {
        $orders = Order::all();
        $totalOrdersPrice = $orders->sum('total_price');
        return view('orders.index', compact('orders', 'totalOrdersPrice'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Заказ успешно удалён');
    }
}
