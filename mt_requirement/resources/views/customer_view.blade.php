<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Management</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
    }

    .sidebar {
      width: 220px;
      background-color: white;
      height: 100vh;
      padding: 20px;
      border-right: 1px solid #ddd;
    }
    .sidebar h2 {
      color: #4b0082;
      margin-bottom: 30px;
      font-size: 22px;
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

    /* Main content */
    .main-content {
      flex: 1;
      padding: 30px;
      background-color: #f4f4f4;
    }
    .main-content h2 {
      color: #4b0082;
      margin-bottom: 20px;
    }

    .container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    form input[type="text"], form button {
      padding: 8px;
      margin-right: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th {
      background-color: #4b0082;
      color: white;
      padding: 12px;
    }
    td {
      padding: 10px;
      background-color: #ffffff;
      border-bottom: 1px solid #eee;
      text-align: center;
    }

    .actions a, .actions button {
      padding: 6px 12px;
      margin: 3px;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      cursor: pointer;
      color: white;
    }
    .view {
      background-color: #7a4b99; 
    }
    .edit {
      background-color: #6a3f8b; 
    }
    .delete {
      background-color: #5c3381; 
    }
    .add-btn {
      background-color: #4b2676; 
      text-decoration: none;
      padding: 8px 12px;
      color: white;
      border-radius: 5px;
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
      padding: 8px 12px;
      background-color: #4b0082;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }
    .pagination .page-link:hover {
      background-color: #360062;
    }

  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Dashboard</h2>
    <a href="{{ route('customers.index') }}" class="active">Customer List</a>
    <a href="{{ route('orders.index') }}">Order List</a>
    <a href="{{ url('customers/add') }}">Add Customer</a>
  </div>

  <div class="main-content">
    <h2>Customer List</h2>

    <div class="container">

      <form action="{{ route('customers.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by customer name" value="{{ request('search') }}">
        <button type="submit">Search</button>
      </form>

      @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
      @endif

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Total Orders</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->id }}</td>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->phone_number }}</td>
              <td>{{ $customer->address }}</td>
              <td>{{ $customer->total_orders }}</td>
              <td class="actions">
                <a href="{{ url('customers/details/'.$customer->id) }}" class="view">View</a>
                <form action="{{ url('customers/delete/'.$customer->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this customer and all associated orders?')">Delete</button>
                </form>
                <a href="{{ url('customers/add_product/'.$customer->id) }}" class="add-btn">Add Product</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="pagination">
        {{ $customers->links('pagination::bootstrap-4') }}
      </div>

    </div>
  </div>

</body>
</html>
