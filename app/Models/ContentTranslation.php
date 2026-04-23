<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentTranslation extends Model
{
    protected $fillable = [
        'language_id',
        'content_section_id',
        'content_block_id',
        'field',
        'value',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(ContentSection::class, 'content_section_id');
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(ContentBlock::class, 'content_block_id');
    }
}
