<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Paginate projects, 6 per page
        $projects = Project::with('skills')->latest()->paginate(6);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'link' => 'nullable|url',
        ]);

        $project = Project::create($data);

        // Respond with the partial to append
        return response()->view('projects.partials.project-card', compact('project'))
            ->header('HX-Trigger', 'projectAdded');
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
            'title' => 'required|string|max:255',
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