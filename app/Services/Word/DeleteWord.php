<?php

namespace App\Services\Word;

use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteWord extends BaseService
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
    public function execute(array $data): bool
    {
        $this->validate($data);

        $word = Word::findOrFail($data['id']);

        $word->delete();

        return true;
    }
}
