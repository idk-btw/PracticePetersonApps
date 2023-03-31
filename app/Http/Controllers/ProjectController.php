<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Project::all());
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:projects',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);
        return response()->json($project, 201);
    }

    public function delete(Project $project)
    {
        return $project->delete();
    }

    public function show(Project $project)
    {
        return response()->json($project->load('notes'));
    }
}
