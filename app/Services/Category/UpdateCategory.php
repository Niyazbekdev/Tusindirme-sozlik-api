<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateCategory extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id',
            'title' => 'required',
            'description' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $category = Category::findOrFail($data['id']);

        $category->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
