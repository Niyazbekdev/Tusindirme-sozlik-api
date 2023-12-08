<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request)
    {
        return Word::paginate($request->limit ?? 10);
    }

    public function show(string $word)
    {
        $text = Word::findOrFail($word);

        $text->count++;

        $text->update([
            'count' => $text->count,
        ]);

        return new  WordResource($text);
    }
}
