@extends('layouts.base')

@section('content')
    <div class="container my-5">
        <h1>All Courses</h1>
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
