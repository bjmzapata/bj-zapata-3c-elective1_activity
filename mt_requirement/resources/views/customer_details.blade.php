<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customer Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
    }

    .container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      width: 60%;
      max-width: 800px;
    }

    h2 {
      text-align: center;
      color: #333;
      font-size: 24px;
    }

    fieldset {
      border: 2px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      background-color: #fff;
    }

    legend {
      font-weight: bold;
      color: #444;
      padding: 5px 10px;
      background: #6a0dad;
      border-radius: 5px;
      color: white;
    }

    p, li {
      font-size: 16px;
      color: #555;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    .order-card {
      background: #f9f9f9;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
    }

    .order-card h4 {
      color: #6a0dad;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .order-card p {
      font-size: 14px;
      margin: 5px 0;
    }

    .btn-container {
      text-align: center;
      margin-top: 20px;
    }

    a, button {
      display: inline-block;
      padding: 10px 15px;
      margin: 5px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      background-color: #6a0dad; 
      color: white;
      border: none;
      cursor: pointer;
      text-align: center;
    }

    a:hover, button:hover {
      opacity: 0.8;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
    }

    .delete-order-btn {
      background-color: #e74c3c;
    }

    .delete-order-btn:hover {
      background-color: #c0392b;
    }

    .delete {
      background-color: #e74c3c; 
    }

    .delete:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Customer Details</h2>

  <fieldset>
    <legend>Personal Information</legend>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
    <p><strong>Address:</strong> {{ $customer->address }}</p>
  </fieldset>

  <fieldset>
    <legend>Orders</legend>
    @if(!$deals->isEmpty())
        <div class="order-list">
            @foreach($deals as $deal)
                <div class="order-card">
                    <h4>{{ $deal->product_service_name }}</h4>
                    <p><strong>Price:</strong> ₱{{ number_format($deal->price, 2) }}</p>
                    <p><strong>Quantity:</strong> {{ $deal->quantity }}</p>
                    <p><strong>Status:</strong> {{ $deal->status ?? 'N/A' }}</p>
                    <p><strong>Ordered At:</strong> {{ \Carbon\Carbon::parse($deal->created_at)->format('Y-m-d H:i') }}</p>
                    <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::parse($deal->updated_at)->format('Y-m-d H:i') }}</p>
                    @if(isset($deal) && isset($deal->id))
                    <a href="{{ route('customers.editProduct', $deal->id) }}" class="edit-order-btn">Edit Order</a>
                    <form action="{{ route('customers.deleteProduct', $deal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-order-btn" onclick="return confirm('Are you sure you want to delete this order?')">Delete Order</button>
                    </form>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p>No orders available.</p>
    @endif
  </fieldset>

  <div class="btn-container">
    <a href="{{ url('customers/edit/'.$customer->id) }}" class="edit-btn">Edit Customer</a>
    <a href="{{ url('customers/view') }}" class="back-btn">Back to Customer List</a>
    <form action="{{ url('customers/delete/'.$customer->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this customer and all associated orders/records?')">Delete</button>
    </form>
  </div>
</div>

</body>
</html>
