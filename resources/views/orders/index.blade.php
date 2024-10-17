<x-header></x-header>
<h1>Заказы</h1>
<ul>
    @foreach ($orders as $order)
    <li>
        Заказ #{{ $order->id }} from {{ $order->created_at->format('d/m/Y') }}<br>
        Продукты: {{ implode(', ', array_column(json_decode($order->products, true), 'name')) }}<br>
        Сумма заказа: {{ $order->total_price }} RUB
        <form action="/orders/{{ $order->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" type="submit">Удалить заказ</button>
        </form>
    </li>
    @endforeach
</ul>
<p>Всего за все заказы: {{ $totalOrdersPrice }} RUB</p>
<x-footer></x-footer>