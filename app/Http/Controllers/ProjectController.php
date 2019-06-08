<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * /projects
     */
    public function index()
    {
        $projects = Project::with('user')->latest()->paginate(12);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Project::class);
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|url',
            'description' => 'required'
        ]);

        auth()->user()->projects()->create($validatedData);

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     * /projects/1
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
