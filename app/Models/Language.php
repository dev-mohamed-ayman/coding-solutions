<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

class Language extends Model
{
    protected $fillable = [
        'code',
        'name',
        'native_name',
        'direction',
        'is_active',
        'is_default',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_default' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Language $language) {
            if ($language->is_default) {
                static::query()->whereKeyNot($language->getKey())->update(['is_default' => false]);
            }
        });
    }

    public function siteTranslations(): HasMany
    {
        return $this->hasMany(SiteTranslation::class);
    }

    public static function defaultLanguage(): ?self
    {
        if (! Schema::hasTable('languages')) {
            return null;
        }

        return static::query()
            ->where('is_active', true)
            ->where('is_default', true)
            ->first()
            ?? static::query()->where('is_active', true)->orderBy('sort_order')->first();
    }

    public static function defaultCode(): string
    {
        return static::defaultLanguage()?->code ?? config('app.locale', 'en');
    }
}
