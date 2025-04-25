@extends('layouts.app')

@section('content')
    <h2>Student List</h2>

    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by name..." class="form-control">
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Course</th><th>Year Level</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->year_level }}</td>
                <td>
                    <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">View QR</a>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
