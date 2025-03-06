<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="{{ url('/customer/1/bj/Urdaneta') }}">Customer</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/item/101/Trouser/360') }}">Item</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/order/1/bj/201/2025-03-06') }}">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/orderdetails/1001/201/101/Trouser/360/1') }}">Order Details</a></li>
            </ul>
        </nav>

        <div class="mt-4">
            @yield('content')
        </div>
    </div>
</body>
</html>