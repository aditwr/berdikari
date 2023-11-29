<div class="bg-white flex flex-col justify-center shadow w-full h-full py-8 px-2 md:px-4 rounded-lg">
    <div class="">
        <p class="heading-5 text-center">Ringkasan Keuangan</p>
        <div class="mt-4 mb-4">
            <livewire:components.doughnut-chart id_chart="persentase_semua_keuangan" container_class="w-full h-64"
                label="Saldo" :labels="$ringkasanKeuangan['labels']" :data="$ringkasanKeuangan['data']">
        </div>
        <div class="">
            <div class="text-center">
                <h6 class="mt-2 mb-2 font-medium subheading-6 text-dark-secondary">Total Saldo
                    Keuangan
                </h6>
                <div class="flex gap-x-1 items-center justify-center">
                    <div class="">
                        <img src="https://img.icons8.com/fluency/48/cheap-2.png" alt="cheap-2" class="h-8 w-auto" />
                    </div>
                    <h3 class="">
                        <span class="font-medium text-primary-500 text-lg">Rp</span>
                        <span
                            class="font-semibold text-primary-600 heading-4 tracking-tight">{{ number_format($total_saldo_karangtaruna, 0, ',', '.') }}</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
