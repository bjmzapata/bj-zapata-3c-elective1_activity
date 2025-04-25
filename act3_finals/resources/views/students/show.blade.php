@extends('layouts.app')

@section('content')
<h2>QR Code for {{ $student->name }}</h2>

<div class="mb-3">
    {!! $qrCode !!}
</div>

<ul class="list-group">
    <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
    <li class="list-group-item"><strong>Course:</strong> {{ $student->course }}</li>
    <li class="list-group-item"><strong>Year Level:</strong> {{ $student->year_level }}</li>
</ul>

<a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
