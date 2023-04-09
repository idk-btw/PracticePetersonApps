<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(User::all());
    }

    public function show($id): JsonResponse
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
