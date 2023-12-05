<?php

namespace App\Services\Antonym;

use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteAntonym extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:words,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Word $word): bool
    {
        $this->validate($data);

        $word->antonym_words()->detach($data['id']);

        return true;
    }
}
