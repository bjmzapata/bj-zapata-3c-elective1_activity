@extends('master')

@section('content')
    <h2>Order Details View</h2>
    <form>
        <label>Transaction No:</label>
        <input type="text" value="{{ $trans_no }}" class="form-control" readonly>

        <label>Order No:</label>
        <input type="text" value="{{ $order_no }}" class="form-control" readonly>

        <label>Item ID:</label>
        <input type="text" value="{{ $item_id }}" class="form-control" readonly>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" class="form-control" readonly>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" class="form-control" readonly>

        <label>Quantity:</label>
        <input type="text" value="{{ $qty }}" class="form-control" readonly>
    </form>
@endsection
