<?php

namespace App\Services\Antonym;

use App\Models\User;
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

        $user = User::where('id', auth()->id())->first();

        $method = "create antonym word";

        $user->words()->attach($word->id, [
            'method' => $method,
            'created_at' => now(),
        ]);

        return true;
    }
}
