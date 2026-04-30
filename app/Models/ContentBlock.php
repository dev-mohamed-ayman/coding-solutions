<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Spatie\Translatable\HasTranslations;

class ContentBlock extends Model
{
    use HasTranslations;

    protected $fillable = [
        'content_page_id',
        'zone',
        'image_path',
        'type',
        'slug',
        'title',
        'body',
        'cta_label',
        'subtitle',
        'tag',
        'alt',
        'payload',
        'is_active',
        'sort_order',
    ];

    public $translatable = ['title', 'body', 'cta_label', 'subtitle', 'tag', 'alt'];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'is_active' => 'boolean',
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
