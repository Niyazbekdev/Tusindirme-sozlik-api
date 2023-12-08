<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = mb_strtolower($request->search, 'UTF-8');

        $words = Word::where(function ($query) use ($searchTerm) {
            $query->whereRaw('LOWER(JSON_EXTRACT(title, "$.latin")) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(JSON_EXTRACT(title, "$.kiril")) LIKE ?', ["%{$searchTerm}%"]);
        })->get();

        return $words;
    }
}
