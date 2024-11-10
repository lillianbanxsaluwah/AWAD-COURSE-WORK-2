@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="message-container">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Teacher</h4>
                                <p class="card-description">Update the teacher details below</p>
                                <form action="{{ route('teacher.update', $teacher->id) }}" method="POST"
                                    class="forms-sample">
                                    @csrf
                                    @method('PUT') <!-- PUT method for update -->

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $teacher->name }}" placeholder="Teacher's Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                            value="{{ $teacher->date_of_birth }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="" disabled>Select Gender</option>
                                            <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ $teacher->gender == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Other" {{ $teacher->gender == 'Other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ $teacher->address }}" placeholder="Address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" class="form-control"
                                            value="{{ $teacher->phone }}" placeholder="Phone Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $teacher->email }}" placeholder="Email" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Update Teacher</button>
                                    <a href="{{ route('teacher.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                @include('backend.layouts.footer') <!-- Include the footer -->
            </div>
        </div>
    </div>
@endsection
