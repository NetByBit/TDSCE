<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function index()
    {
        $ideas = Idea::with('user')->latest()->paginate(12);
        return view('ideas.index', compact('ideas'));
    }

    public function create()
    {
        $this->authorize('create', Idea::class);

        return view('ideas.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Idea::class);

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required'
        ]);

        if (array_key_exists('image', $validatedData)) {
            $validatedData['image'] = '/storage/' . $validatedData['image']->store('images', 'public');
        }



        auth()->user()->ideas()->create($validatedData);

        return redirect('/ideas');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
}
