<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .sidebar {
            width: 220px;
            background-color: white;
            padding: 20px;
            color: #4b0082;
            height: 100vh;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            color: #4b0082;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            color: #4b0082;
            background-color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #4b0082;
            color: white;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            background-color: #f4f4f4;
        }

        .main-content h1 {
            margin-bottom: 10px;
            color: #4b0082;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4b0082;
            color: white;
        }

        td {
            background-color: #ffffff;
            border-bottom: 1px solid #eee;
        }

        form input[type="text"] {
            padding: 8px;
            width: 250px;
        }

        form button {
            padding: 8px 12px;
            background-color: #4b0082;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #360062;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            list-style: none;
            padding-left: 0;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
    padding: 4px 8px; 
    font-size: 12px; 
    background-color: #4b0082;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}


        .pagination .page-link:hover {
            background-color: #360062;
        }

        .back-btn {
            text-decoration: none;
            padding: 8px 12px;
            background-color: #7a4b99; 
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background-color: #6a3f8b; 
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="{{ url('customers/view') }}">Customer List</a>
        <a href="{{ url('orders/view') }}" class="active">Order List</a>
        <a href="{{ url('customers/add') }}" class="add-btn">Add New Customer</a>
    </div>

    <div class="main-content">
        <h1>Order List</h1>

        <div class="container">
            <form method="GET" action="{{ route('orders.index') }}">
                <input type="text" name="search" placeholder="Search product/service" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>

            <br>

            @if($orders->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product/Service</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_service_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            @else
                <p>No orders found.</p>
            @endif
        </div>
    </div>

</body>
</html>
