<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'word_id' => $this->pivot->word_id,
            'method' => $this->pivot->method,
            'created_at' => $this->pivot->created_at?->format('y-m-d H:i:s'),
        ];
    }
}
