<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Note::all());
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:notes',
        ]);

        $user = User::findOrFail($request->user_id);
        $project = Project::findOrFail($request->project_id);

        $note = new Note([
            'title' => $request->title,
            'description' => $request->description,
            'hours_spend' => $request->hours_spend,
            'type' => $request->type,
        ]);
        $project->notes()->save($note);
        $user->notes()->save($note);
        $note->save();
        return response()->json($note, 201);
    }

    public function delete(Note $note)
    {
        return $note->delete();
    }

    public function show(Note $note)
    {
        return response()->json($note->load('users'));
    }

    public function updateNoteStage()
    {

    }
}
