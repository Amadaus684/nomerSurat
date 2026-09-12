@if (! app(\App\Services\SettingService::class)->isConfigured())
    <div class="mb-6 rounded-xl border border-warning-300 bg-warning-50 px-4 py-3 dark:border-warning-700 dark:bg-warning-950">
        <div class="flex items-center gap-3">
            <x-heroicon-o-exclamation-triangle
                class="h-5 w-5 shrink-0 text-warning-600 dark:text-warning-400"
            />

            <div class="flex-1">
                <p class="text-sm font-semibold text-warning-800 dark:text-warning-200">
                    Konfigurasi aplikasi belum lengkap
                </p>

                <p class="text-sm text-warning-700 dark:text-warning-300">
                    Lengkapi Settings sebelum mulai membuat surat.
                </p>
            </div>

            <a
                href="{{ \App\Filament\Clusters\Settings\SettingsCluster::getUrl() }}"
                class="shrink-0 text-sm font-medium text-warning-700 hover:underline dark:text-warning-300"
            >
                Buka Settings
            </a>
        </div>
    </div>
@endif