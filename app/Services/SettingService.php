<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function get(string $key, mixed $default = null): mixed
    {
        $setting = Setting::where('key', $key)->first();

        return $setting?->typed_value ?? $default;
    }

    public function set(
        string $key,
        mixed $value,
        string $type = 'string',
        string $group = 'general'
    ): Setting {
        $storedValue = match ($type) {
            'boolean' => $value ? '1' : '0',
            'integer' => (string) $value,
            'float' => (string) $value,
            'json', 'array' => json_encode($value),
            default => (string) $value,
        };

        return Setting::updateOrCreate(
            ['key' => $key],
            [
                'value' => $storedValue,
                'type' => $type,
                'group' => $group,
            ]
        );
    }

    public function forget(string $key): bool
    {
        return Setting::where('key', $key)->delete() > 0;
    }
}