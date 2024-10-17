<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Тестовое задание Заиткулов</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Продукты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/checkout">Корзина</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/orders">Заказы</a>
                        </li>
                       
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    @if (session('success'))
    <div class="alert alert-success">
        <span>{{ session('success') }}</span>

    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-error">
        <span>{{ session('error') }}</span>

    </div>
    @endif