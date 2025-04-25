<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product/Service</title>
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
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 15px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            background-color: #6a0dad; 
            color: white;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Product/Service</h2>

        <form action="{{ route('customers.updateProduct', $deal->id) }}" method="POST">
            @csrf
            <input type="hidden" name="customer_id" value="{{ $deal->customer_id }}">

            <div class="form-group">
                <label for="product_service_name">Product/Service Name</label>
                <input type="text" name="product_service_name" id="product_service_name" value="{{ old('product_service_name', $deal->product_service_name) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $deal->quantity) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $deal->price) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Ordered" {{ (isset($activity) && $activity->status == 'Ordered') ? 'selected' : '' }}>Ordered</option>
                    <option value="In Progress" {{ (isset($activity) && $activity->status == 'In Progress') ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ (isset($activity) && $activity->status == 'Completed') ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Update Product/Service</button>
            </div>
        </form>
    </div>

</body>
</html>
