<?php

namespace App\Filament\Widgets;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Widgets\Widget;

class SetupWarning extends Widget
{
    protected string $view = 'filament.widgets.setup-warning';

    protected static ?int $sort = -100;

    protected int|string|array $columnSpan = 'full';

    public function shouldShow(): bool
    {
        return ! app(SettingService::class)->isConfigured();
    }

    public function getSettingsUrl(): string
    {
        return SettingsCluster::getUrl();
    }
}