@if (
    ! request()->is('admin/settings/*')
    && ! app(\App\Services\SettingService::class)->isConfigured()
)
    <div class="mb-6 flex items-center gap-3 rounded-lg border border-danger-500/30 bg-danger-500/10 px-4 py-3">

        <x-filament::icon
            icon="heroicon-o-exclamation-triangle"
            class="size-5 shrink-0"
            style="color: #ef4444;"
        />

        <div class="flex-1">
            <span
                class="text-sm font-medium"
                style="color: #ef4444;"
            >
                Konfigurasi aplikasi belum lengkap.
            </span>

            <span class="ml-1 text-sm text-gray-600 dark:text-gray-400">
                Lengkapi Settings sebelum membuat surat.
            </span>
        </div>

        <a
            href="{{ \App\Filament\Clusters\Settings\SettingsCluster::getUrl() }}"
            class="shrink-0 text-sm font-medium hover:underline"
            style="color: #ef4444;"
        >
            Buka Settings
        </a>

    </div>
@endif