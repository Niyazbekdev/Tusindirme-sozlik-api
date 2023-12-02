<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Word extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description', 'is_correct',];

    public array $translatable = ['title', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
