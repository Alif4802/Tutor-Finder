<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Search;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        // Fetch all saved searches for the current user
        $savedSearches = Search::where('user_id', Auth::id())->get();

        return view('search.index', compact('savedSearches'));
    }

    public function search(Request $request)
    {
        $query = User::query();

        // Apply subject filter
        if ($request->has('subject')) {
            $query->where('subject', $request->input('subject'));
        }

        // Apply education background filter
        if ($request->has('education_background')) {
            $query->where('education_background', $request->input('education_background'));
        }

        // Apply location filter
        if ($request->has('location')) {
            $query->where('location', $request->input('location'));
        }

        // Get the search results
        $results = $query->get();

        // Save the search for the current user
        $this->saveSearch($request);

        return view('search.results', compact('results'));
    }

    private function saveSearch(Request $request)
    {
        $search = new Search();
        $search->user_id = Auth::id();
        $search->subject = $request->input('subject');
        $search->education_background = $request->input('education_background');
        $search->location = $request->input('location');
        $search->save();
    }
}
