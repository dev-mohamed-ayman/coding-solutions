<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Spatie\Translatable\HasTranslations;

class ContentSection extends Model
{
    use HasTranslations;

    protected $fillable = [
        'content_page_id',
        'section_key',
        'title',
        'schema',
        'sort_order',
    ];

    public $translatable = ['title'];

    protected function casts(): array
    {
        return [
            'schema' => 'array',
            'sort_order' => 'integer',
        ];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(ContentPage::class, 'content_page_id');
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ContentTranslation::class);
    }
}
