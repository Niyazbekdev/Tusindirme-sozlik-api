<?php

namespace App\Services\Word;

use App\Models\User;
use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateWord extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:words,id',
            'title' => 'required',
            'description' => 'required',
            'is_correct' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $word = Word::findOrFail($data['id']);

        $word->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'is_correct' => $data['is_correct'],
        ]);

        $user = User::where('id', auth()->id())->first();

        $method = "update word";

        $user->words()->attach($word->id, [
            'method' => $method,
            'created_at' => now(),
        ]);

        return true;
    }
}
