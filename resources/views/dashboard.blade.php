@extends('backend.layouts.main')
@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.settings')
            @include('backend.layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="page-title">Dashboard</h3>
                                <div class="row grid-margin">
                                    <div class="col-12">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                                    <div class="statistics-item">
                                                        <p><i class="icon-sm fa fa-user mr-2"></i> Students</p>
                                                        <h2>{{ $currentStudentsCount }}</h2>
                                                    </div>
                                                    <div class="statistics-item">
                                                        <p><i class="icon-sm fas fa-hourglass-half mr-2"></i> Teachers</p>
                                                        <h2>{{ $currentTeachersCount }}</h2>
                                                    </div>
                                                    <div class="statistics-item">
                                                        <p><i class="icon-sm fas fa-clock mr-2"></i> Sessions</p>
                                                        <h2>{{ $currentSessionsCount }}</h2>
                                                    </div>
                                                    <div class="statistics-item">
                                                        <p><i class="icon-sm fas fa-book mr-2"></i> Subjects</p>
                                                        <h2>{{ $totalSubjects }}</h2>
                                                    </div>
                                                    <div class="statistics-item">
                                                        <p><i class="icon-sm fas fa-users mr-2"></i> Total Users</p>
                                                        <h2>{{ $totalUsers }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{--  <div class="col-md-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Student Growth per Week</h4>
                                                <canvas id="student-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <div class="row">
                                        <div class="col-lg-6 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title">Line chart</h4>
                                              <canvas id="lineChart"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-6 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title">Bar chart</h4>
                                              <canvas id="barChart"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                    {{--  <div class="col-md-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Teacher Growth per Week</h4>
                                                <canvas id="teacher-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const studentData = {!! json_encode($studentData) !!};
        const teacherData = {!! json_encode($teacherData) !!};

        const weeks = studentData.map(item => item.week);
        const studentDataset = studentData.map(item => item.total);
        const teacherDataset = teacherData.map(item => item.total);

        // Student Chart
        const studentCtx = document.getElementById('student-chart').getContext('2d');
        new Chart(studentCtx, {
            type: 'line',
            data: {
                labels: weeks,
                datasets: [{
                    label: 'Students',
                    data: studentDataset,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Teacher Chart
        const teacherCtx = document.getElementById('teacher-chart').getContext('2d');
        new Chart(teacherCtx, {
            type: 'line',
            data: {
                labels: weeks,
                datasets: [{
                    label: 'Teachers',
                    data: teacherDataset,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
@endsection

