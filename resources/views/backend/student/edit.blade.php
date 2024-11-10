@extends('backend.layouts.main')
@section('content')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('backend.layouts.settings')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->

            @include('backend.layouts.sidebar')

            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Student Information</h4>
                                <p class="card-description">Update student details below</p>

                                <div class="message-container">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                                <!-- Edit Form -->
                                <form class="forms-sample" method="POST" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="exampleInputName1">Full Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            name="full_name" value="{{ $student->full_name }}" placeholder="Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3"
                                            name="email" value="{{ $student->email }}" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword4"
                                            name="password" placeholder="Password" />
                                        <small>Leave blank to keep the current password</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Gender</label>
                                        <select class="form-control" id="exampleSelectGender" name="gender">
                                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>File Upload</label>
                                        <input type="file" name="img[]" class="file-upload-default" multiple />
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" />
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                        @if($student->file_path)
                                            <p>Current file: {{ $student->file_path }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Level</label>
                                        <input type="text" class="form-control" id="exampleInputCity1"
                                            name="level" value="{{ $student->level }}" placeholder="Level" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Age</label>
                                        <input type="text" class="form-control" id="exampleInputCity1"
                                            name="age" value="{{ $student->age }}" placeholder="Age" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Subjects</label>
                                        <input type="text" class="form-control" id="exampleInputCity1"
                                            name="subjects" value="{{ $student->subjects }}" placeholder="Subjects" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Textarea</label>
                                        <textarea class="form-control" id="exampleTextarea1" name="textarea" rows="4">{{ $student->textarea }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <a href="{{ route('student.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    @include('backend.layouts.footer')

    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
@endsection
