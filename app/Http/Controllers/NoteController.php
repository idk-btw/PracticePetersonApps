<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $note = Note::find(1);
        return response()->json($note);
    }

    public function create(): JsonResponse
    {
        $noteData = [
            'id' => '1',
            'title' => 'blabla',
            'description' => 'yes',
            'hours_spend' => '123',
            'comments' => 'ifwodkf'
        ];
        $note = Note::create($noteData);
        return response()->json($note);
    }
}
