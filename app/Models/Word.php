<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Word extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = ['title', 'description', 'is_correct',];

    public array $translatable = ['title', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('title', 'like', "%{$search}%");
    }

    public function synonym_words(): BelongsToMany
    {
        return $this->belongsToMany(Word::class, 'synonym_words', 'word_id', 'synonym_id');
    }

    public function antonym_words(): BelongsToMany
    {
        return $this->belongsToMany(Word::class, 'antonym_words', 'word_id', 'antonym_id');
    }
}
