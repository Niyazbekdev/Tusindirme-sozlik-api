<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Word;

class ManySearchWordController extends Controller
{
    public function index()
    {
        $words = Word::orderByDesc('count')->paginate(10);

        return response()->json([
            'data' => $words
        ]);
    }
}
