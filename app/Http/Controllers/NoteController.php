<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $note = Note::find(3);
        return response()->json($note);
    }

    public function create(): JsonResponse
    {
        $noteData = [
            'id' => '3',
            'title' => 'qwerty',
            'description' => 'qwerty 123',
            'hours_spend' => '15',
            'comments' => 'awesome!'
        ];
        $note = Note::create($noteData);
        return response()->json($note);
    }
}
