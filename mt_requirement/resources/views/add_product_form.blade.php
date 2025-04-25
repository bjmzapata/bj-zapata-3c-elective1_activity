<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product/Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4b0082; /* Purple color */
            margin-bottom: 20px;
            font-size: 24px;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn {
            margin-top: 20px;
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #4b0082;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #6a3f8b; 
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #4b0082;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add Product/Service for {{ $customer->name }}</h2>
        <form method="POST" action="{{ url('customers/add_product/'.$customer->id) }}">
            @csrf

            <label for="product_service_name">Product/Service Name</label>
            <input type="text" name="product_service_name" id="product_service_name" required>

            <label for="price">Price</label>
            <input type="number" name="price" id="price" required>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" required>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Ordered">Ordered</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>

            <button type="submit" class="btn">Add Product/Service</button>
        </form>

        <div class="back-link">
            <a href="{{ url('customers/details/'.$customer->id) }}">Back to Customer Details</a>
        </div>
    </div>

</body>
</html>
