@extends('layouts.base')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $course->title }}</h1>
                <p>{{ $course->description }}</p>
                <h4>Lessons</h4>
                <ul>
                    @foreach ($course->lessons as $lesson)
                        <li>{{ $lesson->title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enroll Now</h5>
                        <p class="card-text">Get full access to this course.</p>
                        <form action="{{ route('enrollments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="btn btn-primary">Enroll</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
