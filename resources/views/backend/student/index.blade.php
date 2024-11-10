@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        <!-- Partial navbar -->
        @include('backend.layouts.nav')

        <div class="container-fluid page-body-wrapper">
            <!-- Partial sidebar -->
            @include('backend.layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">


                    <div class="page-header">
                        <h3 class="page-title">View Students</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data table
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Students</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Level</th>
                                                    <th>Age</th>
                                                    <th>Subjects</th>
                                                    <th>File Path</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($students as $student)
                                                <tr>
                                                    <td>{{  $loop->iteration}}</td>
                                                    <td>{{ $student->full_name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->gender }}</td>
                                                    <td>{{ $student->level }}</td>
                                                    <td>{{ $student->age }}</td>
                                                    <td>{{ $student->subjects }}</td>
                                                    <td>{{ $student->file_path }}</td>
                                                    <td>
                                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline-primary">
                                                            Edit
                                                        </a>

                                                        <!-- Delete Button with Form -->
                                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this student?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Partial footer -->
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection
