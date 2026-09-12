<x-filament-widgets::widget>
    <x-filament::section>
        @if ($this->shouldShow())
            <div class="rounded-xl border border-warning-200 bg-warning-50 p-4 dark:border-warning-800 dark:bg-warning-950">
                <div class="flex items-start gap-3">
                    <x-heroicon-o-exclamation-triangle
                        class="h-6 w-6 shrink-0 text-warning-600 dark:text-warning-400"
                    />

                    <div class="flex-1">
                        <h3 class="font-semibold text-warning-800 dark:text-warning-200">
                            Konfigurasi aplikasi belum lengkap
                        </h3>

                        <p class="mt-1 text-sm text-warning-700 dark:text-warning-300">
                            Silakan lengkapi pengaturan aplikasi sebelum mulai membuat surat.
                        </p>

                        <div class="mt-3">
                            <a
                                href="{{ $this->getSettingsUrl() }}"
                                class="inline-flex items-center rounded-lg bg-warning-600 px-3 py-2 text-sm font-medium text-white hover:bg-warning-700"
                            >
                                Buka Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
