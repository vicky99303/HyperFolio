<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        // Paginate projects, 15 per page
        $projects = Project::with('skills')->latest()->paginate(8);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:projects,title',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'link' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            if ($request->header('HX-Request')) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $project = Project::create($data);

        // If request comes from HTMX, redirect back to projects page
        if ($request->header('HX-Request')) {
            return response('', 200)
                ->header('HX-Redirect', route('projects.index'));
        }

        // Normal Laravel redirect
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        return view('projects.modal', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title,' . $project->id,
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'link' => 'nullable|url',
        ]);

        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted!');
    }
}