<?php

namespace App\Exports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class WordsExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return Word::get();
    }

    public function headings(): array
    {
        return [
            'id',
            'category_id',
            'name',
            'description',
            'count',
            'is_correct',
            'created_at',
            'updated_at',
        ];
    }

    public function title(): string
    {
        return 'Tusindirme Sozlik';
    }
}
