<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\Translatable\HasTranslations;

class SiteTranslation extends Model
{
    use HasTranslations;

    protected $fillable = [
        'key',
        'value',
    ];

    public $translatable = ['value'];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
