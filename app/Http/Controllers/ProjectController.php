<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Project::all());
    }

    public function create(ProjectRequest $request): JsonResponse
    {
        $project = Project::create($request->validated());
        return response()->json($project);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project->load('notes'));
    }

    public function update(ProjectRequest $request, Project $project): JsonResponse
    {
        $project->update($request->validated());
        return response()->json($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        return response()->json($project->delete(), 204);
    }
}
