<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function create()
    {
        return view('enrollments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::create($validatedData);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    public function edit(Enrollment $enrollment)
    {
        return view('enrollments.edit', compact('enrollment'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment->update($validatedData);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}