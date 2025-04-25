<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        h2 {
            text-align: center;
            color: #4b0082; /* Purple color */
            margin-bottom: 20px;
            font-size: 24px;
        }

        fieldset {
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        legend {
            font-weight: bold;
            color: #444;
            padding: 5px 10px;
            background: #ddd;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .success-box {
            color: green;
            background: #e6ffe6;
            padding: 10px;
            border: 1px solid green;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        button, a {
            display: inline-block;
            padding: 12px 18px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .submit-btn {
            background-color: #4b0082; 
            color: white;
        }

        .submit-btn:hover {
            background-color: #6a3f8b;
        }

        .back-btn {
            background-color: #007bff; 
            color: white;
        }

        .back-btn:hover {
            background-color: #0056b3; 
        }

        button:hover, a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add New Customer</h2>

        @if(session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <fieldset>
            <legend>Customer Details</legend>
            <form action="{{ url('customers/insert') }}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customerId ?? '' }}">

                <label for="name">Customer Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="product_service_name">Product/Service Availed:</label>
                <input type="text" id="product_service_name" name="product_service_name" required>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price"  required>

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Ordered">Ordered</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>

                <div class="btn-container">
                    <button type="submit" class="submit-btn">Add Customer</button>
                </div>
            </form>
        </fieldset>

        <hr>

        <div class="btn-container">
            <a href="{{ url('customers/view') }}" class="back-btn">Back to Customer List</a>
        </div>
    </div>

</body>
</html>
