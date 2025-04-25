@extends('layouts.app')

@section('content')
<h2>Add Student</h2>

<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <div class="mb-2">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Course</label>
        <input type="text" name="course" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Year Level</label>
        <input type="text" name="year_level" class="form-control" required>
    </div>
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
