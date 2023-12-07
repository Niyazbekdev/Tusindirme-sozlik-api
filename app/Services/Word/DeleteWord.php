<?php

namespace App\Services\Word;

use App\Models\User;
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

        $user = User::where('id', auth()->id())->first();

        $method = "delete word";

        $user->words()->attach($word->id, [
            'method' => $method,
            'created_at' => now(),
        ]);

        return true;
    }
}
