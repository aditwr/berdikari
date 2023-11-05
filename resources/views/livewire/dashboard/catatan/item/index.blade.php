<div class="">
    <div class="w-full 2xl:w-10/12">
        @can('buat-catatan')
            <div class="mb-6">
                <a href="{{ route('dashboard.catatan.tambah') }}" class="btn-primary">Buat Catatan Baru</a>
            </div>
        @endcan
        <livewire:dashboard.catatan.item.table />
    </div>
</div>
