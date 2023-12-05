<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Services\Synonym\CreateSynonym;
use App\Services\Synonym\DeleteSynonym;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SynonymWordController extends Controller
{
    public function index( Word $word): Collection
    {
        return $word->synonym_words()->get();
    }

    public function store(Request $request, Word $word)
    {
        try {
            app(CreateSynonym::class)->execute($request->all(), $word);
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function destroy(Word $word, string $synonym)
    {
        try {
            app(DeleteSynonym::class)->execute([
                'id' => $synonym,
            ],$word);
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
