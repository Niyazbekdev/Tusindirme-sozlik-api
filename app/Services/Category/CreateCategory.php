<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class CreateCategory extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        Category::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
