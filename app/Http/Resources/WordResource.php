<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getTranslations('title'),
            'category' => new CategoryResource($this->category),
            'description' => $this->getTranslations('description'),
            'synonym_words' => SynonymWordResource::collection($this->synonym_words),
            'antonym_words' => AntonymWordResource::collection($this->antonym_words),
        ];
    }
}
