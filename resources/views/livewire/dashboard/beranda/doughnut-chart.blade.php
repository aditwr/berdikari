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
                    Keuangan Karangtaruna
                </h6>
                <h3 class="font-semibold text-primary-800 heading-5">
                    Rp{{ number_format($total_saldo_karangtaruna, 0, ',', '.') }},-</h3>
            </div>
        </div>
    </div>
</div>
