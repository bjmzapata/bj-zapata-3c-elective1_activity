@extends('master')

@section('content')
    <h2>Order View</h2>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $customer_id }}" class="form-control" readonly>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" class="form-control" readonly>

        <label>Order No:</label>
        <input type="text" value="{{ $order_no }}" class="form-control" readonly>

        <label>Date:</label>
        <input type="text" value="{{ $date }}" class="form-control" readonly>
    </form>
@endsection
