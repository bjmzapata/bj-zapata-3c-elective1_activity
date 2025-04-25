@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
    </div>
    <div class="mb-2">
        <label>Course</label>
        <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
    </div>
    <div class="mb-2">
        <label>Year Level</label>
        <input type="text" name="year_level" class="form-control" value="{{ $student->year_level }}" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
