<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $project = new Project();
        $request->validate([
            'title' => 'required|string|unique:projects',
            'description' => 'required|string',
            'link' => 'required|url:http,https',
        ]);
        $project->fill($data);
        $project->save();
        return to_route('admin.admin.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = Project::findOrFail($id);
        return view('admin.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        ddd($project);
        return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('projects')->ignore($project)],
            'description' => 'required|string',
            'link' => 'required|url:http,https',
        ]);

        $data = $request->all();

        $project->update($data);

        return to_route('admin.admin.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.admin.index');
    }
}
