@extends('master')

@section('content')
    <h2>Customer View</h2>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $customer_id }}" class="form-control" readonly>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" class="form-control" readonly>

        <label>Address:</label>
        <input type="text" value="{{ $address }}" class="form-control" readonly>
    </form>
@endsection
