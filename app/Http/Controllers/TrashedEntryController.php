<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedEntryController extends Controller
{
    public function index()
    {
        $entries = Entry::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('entries.index')->with('entries', $entries);
    }

    public function show(Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }

        return view('entries.show')->with('entry', $entry);
    }

    public function update(Request $request, Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }

        $entry->restore();

        return to_route('entries.show', $entry)->with('success', 'Entry restored!');
    }

    public function destroy(Entry $entry)
    {
        if(!$entry->user->is(Auth::user())) {
            abort(403);
        }

        $entry->forceDelete();

        return to_route('entries.index')->with('success', 'Entry deleted permanently!');
    }
}