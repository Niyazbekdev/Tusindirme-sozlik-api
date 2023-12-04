<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Word\CreateWord;
use App\Services\Word\DeleteWord;
use App\Services\Word\UpdateWord;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WordController extends Controller
{
    public function index(Request $request, Category $category): LengthAwarePaginator
    {
        return $category->words()->when($request->serch ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);
    }

    public function store(Request $request, Category $category)
    {
        try {
            app(CreateWord::class)->execute($request->all(), $category);
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function update(Request $request, string $word)
    {
        try {
            app(UpdateWord::class)->execute([
                'id' => $word,
                'title' => $request->title,
                'description' => $request->description,
                'is_correct' => $request->is_correct,
            ]);
            return response()->json([
                'Succes' => true,
            ]);
        }catch (ValidationException $exception){
            return  $exception->validator->errors()->all();
        }
    }

    public function destroy(string $word)
    {
        try {
            app(DeleteWord::class)->execute([
                'id' => $word,
            ]);
            return response()->json([
                'Succes' => true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
