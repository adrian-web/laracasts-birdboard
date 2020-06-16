<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        // not needed when used "route model binding" (Project $project)
        // $project = Project::findOrFail(request('project'));

        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);

        // persist
        $project = auth()->user()->projects()->create($attributes);

        // redirect
        return redirect($project->path());
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);
      
        $project->update([
            'notes' => request('notes')
        ]);

        return redirect($project->path());
    }
}
