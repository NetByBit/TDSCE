<?php

namespace App\Http\Controllers;

use App\Testing;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TestingController extends Controller
{

    public function index()
    {
        $testings = Testing::with('user')->latest()->paginate(12);
        return view('testings.index', compact('testings'));
    }

    public function category($category)
    {
        $testings = Testing::with('user')
            ->where('category', $category)
            ->latest()
            ->paginate(12);
        return view('testings.index', compact('testings', 'category'));
    }

    public function create()
    {
        $this->authorize('create', Testing::class);

        return view('testings.create');
    }


    public function store(Request $request)
    {
        $this->authorize('create', Testing::class);
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'url' => 'nullable|url',
            'category' => ['required', Rule::in(['functionality', 'usability', 'database', 'compatibility', 'performance'])],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);
        if (array_key_exists('image', $validatedData)) {
            $validatedData['image'] = '/storage/' . $validatedData['image']->store('images', 'public');
        }

        $testing = auth()->user()->testings()->create($validatedData);

        return redirect('/testings');
    }

    public function show(Testing $testing)
    {
        return view('testings.show', compact('testing'));
    }

}
