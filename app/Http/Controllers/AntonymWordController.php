<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Services\Antonym\CreateAntonym;
use App\Services\Antonym\DeleteAntonym;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AntonymWordController extends Controller
{
    public function index(Word $word): Collection
    {
        return $word->antonym_words()->get();
    }

    public function store(Request $request, Word $word)
    {
        try {
            app(CreateAntonym::class)->execute($request->all(), $word);
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function destroy(Word $word, string $antonym)
    {
        try {
            app(DeleteAntonym::class)->execute([
                'id' => $antonym,
            ], $word);
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
