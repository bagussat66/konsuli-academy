<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function create()
    {
        return view('lessons.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'content' => 'nullable',
        ]);

        Lesson::create($validatedData);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'content' => 'nullable',
        ]);

        $lesson->update($validatedData);

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
    }
}