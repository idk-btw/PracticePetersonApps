<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Note::all());
    }

    public function create(NoteRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $user = Auth::user();
        $project = Project::findOrFail($validatedData['project_id']);

        $note = new Note([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'hours_spend' => $validatedData['hours_spend'],
            'type' => $validatedData['type']
        ]);
        $project->notes()->save($note);
        $user->notes()->save($note);
        $note->save();
        return response()->json($note);
    }

    public function destroy(Note $note): JsonResponse
    {
        return response()->json($note->delete(), 204);
    }

    public function show(Note $note): JsonResponse
    {
        return response()->json($note->load('user'));
    }

    public function update(NoteRequest $request, Note $note): JsonResponse
    {
        $note->update($request->validated());
        return response()->json($note);
    }

    public function updateStage(NoteRequest $request, Note $note): JsonResponse
    {
        $validatedData = $request->validated();

        $note->update($validatedData);
        return response()->json($note);
    }
}
