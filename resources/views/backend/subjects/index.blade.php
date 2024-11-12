@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Teachers Data Table</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Teachers List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="subject-listing" class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Subject ID</th>
                                                    <th>Subject Name</th>
                                                    <th>Subject Code</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($subjects as $subject)
                                                    <tr>
                                                        <td>{{ $subject->id }}</td>
                                                        <td>{{ $subject->subject_name }}</td>
                                                        <td>{{ $subject->subject_code }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Subject Actions">
                                                                <div class="mr-2">
                                                                    <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-warning" title="Edit">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No subjects found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                @include('backend.layouts.footer') <!-- Include the footer -->
            </div>
        </div>
    </div>
@endsection
