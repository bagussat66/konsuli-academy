<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        return view('discussions.index', compact('discussions'));
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);

        Discussion::create($validatedData);

        return redirect()->route('discussions.index')->with('success', 'Discussion created successfully.');
    }

    public function edit(Discussion $discussion)
    {
        return view('discussions.edit', compact('discussion'));
    }

    public function update(Request $request, Discussion $discussion)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);

        $discussion->update($validatedData);

        return redirect()->route('discussions.index')->with('success', 'Discussion updated successfully.');
    }

    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return redirect()->route('discussions.index')->with('success', 'Discussion deleted successfully.');
    }
}