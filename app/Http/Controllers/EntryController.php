<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::where('user_id', Auth::id())->paginate(5);

        // Fetch entries from Database and list them here
        return view('entries.index')->with('entries', $entries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:120',
            'adventure' => 'required',
            'description' => 'required',
        ]);

        Entry::create([
            'user_id' => Auth::id(),
            'title' => $request->get('title'),
            'adventure' => $request->get('adventure'),
            'description' => $request->get('description')
        ]);

        return to_route('entries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entry = Entry::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('entries.show')->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}