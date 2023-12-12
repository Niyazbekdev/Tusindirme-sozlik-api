<?php

namespace App\Http\Controllers;

use App\Services\Word\ImportExcelWord;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ImportExcelWordController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            app(ImportExcelWord::class)->execute($request->all());
            return response()->json([
                'Success' => true,
            ]);
        }catch (ValidationException $exception){
            return response()->json([
                'error' => $exception->validator->errors()->all()
            ]);
        }
    }
}
