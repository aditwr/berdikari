<div class="grid gap-y-8 dashboard-padding-responsive">
    <div class="flex w-full md:gap-x-8 gap-y-8 flex-col md:flex-row items-stretch">
        <div class="md:basis-4/12">
            <livewire:dashboard.beranda.doughnut-chart />
        </div>
        <div class=" md:basis-8/12">
            <livewire:dashboard.beranda.financial-chart />
        </div>
    </div>
    <div class="flex w-full flex-col gap-8 md:flex-row items-stretch">
        <div class="md:basis-4/12">
            {{-- Inventaris --}}
            <livewire:dashboard.beranda.inventaris-summary />
        </div>
        <div class=" md:basis-3/12">
            {{--  --}}
            <livewire:dashboard.beranda.catatan-summary />
        </div>
        <div class="md:basis-5/12">
            <livewire:dashboard.beranda.artikel-summary>
        </div>
    </div>
</div>
