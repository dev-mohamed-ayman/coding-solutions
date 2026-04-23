<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContentBlock extends Model
{
    protected $fillable = [
        'content_page_id',
        'zone',
        'type',
        'payload',
        'is_active',
        'sort_order',
    ];

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
