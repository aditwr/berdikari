<div class="w-full overflow-hidden">
    <div class="flex w-full md:gap-x-6 xl:gap-x-8 gap-y-8 flex-col md:flex-row items-stretch mb-8 md:mb-6 xl:mb-8">
        <div class="md:basis-4/12">
            <livewire:dashboard.beranda.doughnut-chart />
        </div>
        <div class=" md:basis-8/12">
            <livewire:dashboard.beranda.financial-chart />
        </div>
    </div>
    <div class="flex gap-x-6 w-full flex-col gap-y-6 2xl:flex-row items-stretch">
        <div class="flex flex-col md:flex-row md:gap-x-6 xl:gap-x-8 gap-y-8">
            <div class="md:flex-grow">
                {{-- Inventaris --}}
                <livewire:dashboard.beranda.inventaris-summary />
            </div>
            <div class="md:basis-5/12">
                {{--  --}}
                <livewire:dashboard.beranda.catatan-summary />
            </div>
        </div>
        <div class="md:basis-5/12">
            <livewire:dashboard.beranda.artikel-summary>
        </div>
    </div>
</div>
