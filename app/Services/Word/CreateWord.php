<?php

namespace App\Services\Word;

use App\Models\Category;
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

        $category->words()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'is_correct' => $data['is_correct'],
        ]);

        return true;
    }
}
