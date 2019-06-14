<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Project;
use App\Idea;
use App\Testing;

class CommentController extends Controller
{


    public function project(Request $request, Project $project)
    {
        $this->authorize('create', Comment::class);
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();

        $project->comments()->create($validatedData);

        return back();
    }

    public function idea(Request $request, Idea $idea)
    {
        $this->authorize('create', Comment::class);
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();

        $idea->comments()->create($validatedData);

        return back();
    }

    public function testing(Request $request, Testing $testing)
    {
        $this->authorize('create', Comment::class);
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();

        $testing->comments()->create($validatedData);

        return back();
    }
}
