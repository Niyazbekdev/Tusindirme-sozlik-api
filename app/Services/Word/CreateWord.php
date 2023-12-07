<?php

namespace App\Services\Word;

use App\Models\Category;
use App\Models\User;
use App\Models\Word;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class CreateWord extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'is_correct' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Category $category): bool
    {
        $this->validate($data);

        $word = $category->words()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'is_correct' => $data['is_correct'],
        ]);

        $user = User::where('id', auth()->id())->first();

        $method = "create word";

        $user->words()->attach($word->id, [
            'method' => $method,
            'created_at' => now(),
        ]);

        return true;
    }
}
