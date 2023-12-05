<?php

namespace App\Services\Antonym;

use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class CreateAntonym extends BaseService
{
    public function rules(): array
    {
        return [
            'antonym_id' => 'required|exists:words,id',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Word $word): bool
    {
        $this->validate($data);

        $word->antonym_words()->attach($data['antonym_id']);

        return true;
    }
}
