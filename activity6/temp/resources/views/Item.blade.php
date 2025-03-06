@extends('master')

@section('content')
    <h2>Item View</h2>
    <form>
        <label>Item No:</label>
        <input type="text" value="{{ $item_no }}" class="form-control" readonly>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" class="form-control" readonly>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" class="form-control" readonly>
    </form>
@endsection
