@extends('layouts.base')

@section('content')
    <div class="container my-5">
        <h1>{{ $lesson->title }}</h1>
        <p>{{ $lesson->content }}</p>
        <h4>Quizzes</h4>
        <ul>
            @foreach ($lesson->quizzes as $quiz)
                <li>{{ $quiz->question }}</li>
            @endforeach
        </ul>
    </div>
@endsection
