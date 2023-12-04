<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Category\CreateCategory;
use App\Services\Category\DeleteCategory;
use App\Services\Category\UpdateCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return Category::when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);
    }

    public function store(Request $request)
    {
        try {
            app(CreateCategory::class)->execute($request->all());
            return response()->json([
                'Success'=> true,
                'data' => [
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function update(Request $request, string $category)
    {
        try {
            app(UpdateCategory::class)->execute([
                'id' => $category,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return response()->json([
                'Success' => true,
                'data' => [
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }catch (ModelNotFoundException){
            return response()->json([
                'message' => 'Model Not Found',
            ]);
        }
    }

    public function destroy(string $category)
    {
        try {
            app(DeleteCategory::class)->execute([
                'id' => $category,
            ]);
            return response()->json([
                'Succes' => true,
            ]);
        }catch (ValidationException $exception){
            return  $exception->validator->errors()->all();
        }catch (ModelNotFoundException){
            return response()->json([
                'message' => 'Model Not Found',
            ]);
        }
    }
}
