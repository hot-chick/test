<x-header></x-header>
<h1>Продукты</h1>
<form action="/cart/add" method="POST">
    @csrf
    @foreach ($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->price }} RUB</p>
        <form action="/cart/add" method="POST">
            @csrf
            <input type="number" name="quantity" value="1" min="1">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <button class="btn btn-primary" type="submit">Добавить в корзину</button>
        </form>
    </div>
    @endforeach
</form>
<x-footer></x-footer>