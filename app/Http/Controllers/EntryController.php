<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);

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

        Auth::user()->entries()->create([
            'uuid' => Str::uuid(),
            'title' => $request->get('title'),
            'adventure' => $request->get('adventure'),
            'description' => $request->get('description')
        ]);

        return to_route('entries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }
        return view('entries.show')->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }
        return view('entries.edit')->with('entry', $entry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|min:3|max:120',
            'adventure' => 'required',
            'description' => 'required',
        ]);

        $entry->update([
            'title' => $request->title,
            'adventure' => $request->adventure,
            'description' => $request->description
        ]);

        return to_route('entries.show', $entry)->with('success', 'Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }

        $entry->delete();

        return to_route('entries.index')->with('success', 'Entry successfully moved to trash');
    }
}