<?php

namespace App\Http\Controllers;

use App\Models\Note;
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

        $note = Note::create([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
            'title' => $request->title,
            'description' => $request->description,
            'hours_spend' => $request->hours_spend,
            'type' => $request->type,
        ]);
        return response()->json($note, 201);
    }


}
