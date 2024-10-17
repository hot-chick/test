<x-header></x-header>
<h1>Оформление заказа</h1>
    @if ($cart)
        <ul>
            @foreach ($cart as $item)
                <li>{{ $item['name'] }} (x{{ $item['quantity'] }}) - {{ $item['price'] * $item['quantity'] }} RUB</li>
            @endforeach
        </ul>
        <p>Total: {{ $totalPrice }} RUB</p>
        <form action="/checkout" method="POST">
            @csrf
            <button type="submit">Заказать</button>
        </form>
    @else
        <p>Ваша корзина пуста</p>
    @endif
<x-footer></x-footer>