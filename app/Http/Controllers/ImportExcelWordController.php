<?php

namespace App\Http\Controllers;

use App\Imports\WordImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelWordController extends Controller
{
    public function store(Request $request): JsonResponse
    {

        $import = new WordImport;
        Excel::import($import, $request->imports);
        return response()->json([
            'Success' => true,
        ]);
    }
}
