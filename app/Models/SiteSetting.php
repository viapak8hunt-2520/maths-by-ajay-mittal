<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['group', 'key', 'value'];

    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return Cache::remember("site_setting.{$key}", 300, function () use ($key, $default) {
            $row = self::query()->where('key', $key)->first();

            return $row?->value ?? $default;
        });
    }

    public static function setValue(string $group, string $key, mixed $value): void
    {
        self::query()->updateOrCreate(
            ['key' => $key],
            ['group' => $group, 'value' => $value],
        );

        Cache::forget("site_setting.{$key}");
        Cache::forget('site_settings.all');
    }
}
