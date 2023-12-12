<?php

namespace App\Services\Word;

use App\Imports\WordImport;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelWord extends BaseService
{
    public function rules(): array
    {
        return [
            'file' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $import = new WordImport;

        Excel::import($import, $data['file']);

        return true;
    }
}
