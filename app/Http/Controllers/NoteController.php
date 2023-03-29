<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $note = Note::find(2);
        return response()->json($note);
    }

    public function create(): JsonResponse
    {
        $noteData =
            [
                'id' => '2',
                'title' => 'qwer',
                'description' => 'no',
                'hours_spend' => '15',
                'comments' => 'bebebe'
            ];
        $note = Note::create($noteData);
        return response()->json($note);
    }
}
