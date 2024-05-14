@extends('layouts.base')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4">Welcome to LMS</h1>
                <p class="lead">Learn new skills and advance your career with our online courses.</p>
                <hr class="my-4">
                <p>Choose from a wide range of courses in various categories.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('courses.index') }}" role="button">Explore Courses</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-laptop-code me-2"></i> Web Development</h5>
                        <p class="card-text">Learn to build websites and web applications using modern technologies.</p>
                        <a href="#" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-chart-line me-2"></i> Business</h5>
                        <p class="card-text">Develop your business skills and learn strategies for success.</p>
                        <a href="#" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-palette me-2"></i> Design</h5>
                        <p class="card-text">Unleash your creativity and learn design principles and tools.</p>
                        <a href="#" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
