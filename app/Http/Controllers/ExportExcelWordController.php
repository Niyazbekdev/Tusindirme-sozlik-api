<?php

namespace App\Http\Controllers;

use App\Exports\WordsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelWordController extends Controller
{
    public function store(): bool
    {
        $export = new WordsExport();

        Excel::store($export, 'public/words/sozlik.xlsx');
        return true;
    }
}
