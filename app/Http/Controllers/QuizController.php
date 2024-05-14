<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'question' => 'required',
            'option_a' => 'nullable',
            'option_b' => 'nullable',
            'option_c' => 'nullable',
            'option_d' => 'nullable',
            'correct_answer' => 'nullable|in:a,b,c,d',
        ]);

        Quiz::create($validatedData);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'question' => 'required',
            'option_a' => 'nullable',
            'option_b' => 'nullable',
            'option_c' => 'nullable',
            'option_d' => 'nullable',
            'correct_answer' => 'nullable|in:a,b,c,d',
        ]);

        $quiz->update($validatedData);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}