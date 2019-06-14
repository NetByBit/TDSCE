<?php

namespace App\Http\Controllers;

use App\Testing;
use Illuminate\Http\Request;

class TestingController extends Controller
{

    public function index()
    {
        $testings = Testing::with('user')->latest()->paginate(12);
        return view('testings.index', compact('testings'));
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
            'description' => 'required'
        ]);

        auth()->user()->testings()->create($validatedData);

        return redirect('/testings');
    }

    public function show(Testing $testing)
    {
        return view('testings.show', compact('testing'));
    }

}
