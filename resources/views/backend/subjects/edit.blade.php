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
                                <form action="{{ route('subject.update', $subject->id) }}" method="POST"
                                    class="forms-sample">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="subject_name">Subject Name</label>
                                        <input type="text" name="subject_name" id="subject_name" class="form-control"
                                            value="{{ $subject->subject_name }}" placeholder="Subject Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_code">Subject Code</label>
                                        <input type="text" name="subject_code" id="subject_code" class="form-control"
                                            value="{{ $subject->subject_code }}" placeholder="Subject Code" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Update Subject</button>
                                    <a href="{{ route('subject.index') }}" class="btn btn-light">Cancel</a>
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
