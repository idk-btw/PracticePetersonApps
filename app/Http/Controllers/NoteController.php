<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $note = Note::find(5);
        return response()->json($note);
    }

    public function create(): JsonResponse
    {
        $noteData =
            [
                'id' => '5',
                'title' => '5 useless',
                'description' => 'pushing to merge',
                'hours_spend' => '2',
                'comments' => 'bebebe'
            ];
        $note = Note::create($noteData);
        return response()->json($note);
    }
}
