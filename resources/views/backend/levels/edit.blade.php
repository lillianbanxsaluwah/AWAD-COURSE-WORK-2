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
                                <h4 class="card-title">Edit Level</h4>
                                <p class="card-description">Update the details for this level</p>

                                <div class="message-container">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                                            id="successAlert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            id="errorAlert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                                <!-- Level edit form -->
                                <form class="forms-sample" method="POST" action="{{ route('level.update', $level->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Level Name -->
                                    <div class="form-group">
                                        <label for="level_name">Level Name</label>
                                        <input type="text" class="form-control" id="level_name" name="level_name"
                                            placeholder="Level Name" value="{{ old('level_name', $level->level_name) }}"
                                            required />
                                    </div>
                                    {{--
                                    <!-- Section -->
                                    <div class="form-group">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" id="section" name="section" placeholder="Section" value="{{ old('section', $level->section) }}" required />
                                    </div>
                                     --}}

                                    <div class="form-group">
                                        <label for="section">Section</label>
                                        <select class="form-control" id="section" name="section" required>
                                            <option value="">Select Section</option>
                                            <option value="A-level"
                                                {{ old('section', $level->section) == 'A-level' ? 'selected' : '' }}>
                                                A-level</option>
                                            <option value="O-level"
                                                {{ old('section', $level->section) == 'O-level' ? 'selected' : '' }}>
                                                O-level</option>
                                        </select>
                                    </div>
                                    <!-- Submit and Cancel Buttons -->
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <a href="{{ route('level.index') }}" class="btn btn-light">Cancel</a>
                                </form>

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
@endsection
