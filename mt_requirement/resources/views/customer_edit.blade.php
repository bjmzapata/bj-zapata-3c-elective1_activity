<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
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
            background: #ddd;
            border-radius: 5px;
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

        .error-box {
            color: red;
            background: #ffe6e6;
            padding: 10px;
            border: 1px solid red;
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
            padding: 10px 15px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .update-btn {
            background-color: #6a0dad; 
            color: white;
        }

        .back-btn {
            background-color: #4b0082; 
            color: white;
        }

        button:hover, a:hover {
            opacity: 0.8;
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

    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Customer</h2>
        @if ($errors->any())
            <fieldset>
                <legend>Errors</legend>
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </fieldset>
        @endif

        <fieldset>
            <legend>Customer Details</legend>
            <form action="{{ url('customers/update/'.$customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $customer->name }}" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $customer->phone_number }}" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ $customer->address }}" required>

                <div class="btn-container">
                    <button type="submit" class="update-btn">Update</button>
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
