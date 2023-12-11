<?php

namespace App\Imports;


use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class WordImport implements ToModel
{
    private int $rows = 0;
    public function model(array $row): Word
    {
        ++$this->rows;

        return new Word([
            'category_id' => $row[0],
            'title' => [
                'latin' => $row[1],
                'kiril' => $row[2],
            ],
            'description' => [
                'latin' => $row[3],
                'kiril' => $row[4],
            ],
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
