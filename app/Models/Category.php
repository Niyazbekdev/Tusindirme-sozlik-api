<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }
}
