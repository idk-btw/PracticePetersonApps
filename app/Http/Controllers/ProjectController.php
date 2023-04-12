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
            'title' => 'required|string|max:25|unique:projects',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:25'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);
        return response()->json($project, 201);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project->load('notes'));
    }

    public function update(Request $request, Project $project): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:25|unique:projects',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:25'
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);
        return response()->json($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        return response()->json($project->delete(), 204);
    }
}
