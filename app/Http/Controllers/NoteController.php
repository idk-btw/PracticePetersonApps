<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $note = Note::find(1);
        dd($note);
    }

    public function create()
    {
        $noteArr = [
            [
                'id' => '1',
                'title' => 'blabla',
                'description' => 'yes',
                'hours_spend' => '123',
                'comments' => 'ifwodkf'
            ]
        ];
        foreach ($noteArr as $item) {
            dd($item);
            Note::create();
        }
    }
}

Note::create([
    'id' => '1',
    'title' => 'blabla',
    'description' => 'yes',
    'hours_spend' => '123',
    'comments' => 'ifwodkf'
]);

