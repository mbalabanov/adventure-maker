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
}