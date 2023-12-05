<?php

namespace App\Services\Synonym;

use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class CreateSynonym extends BaseService
{
    public function rules(): array
    {
        return [
            'synonym_id' => 'required|exists:words,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Word $word): bool
    {
        $this->validate($data);

        $word->synonym_words()->syncWithoutDetaching($data['synonym_id']);

        return true;
    }
}
