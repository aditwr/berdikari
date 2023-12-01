<div class="">
    <div class="w-full 2xl:w-10/12">
        @can('buat-catatan')
            <div class="mb-6">
                <a href="{{ route('dashboard.catatan.tambah') }}" class="btn-primary">Buat Catatan Baru</a>
            </div>
        @endcan
        <div class="mb-6">
            <div class="flex gap-x-2 items-center mb-3">
                <div class="">
                    <img src="{{ asset('assets/icons/note.png') }}" alt="" class="h-8 w-auto">
                </div>
                <h3 class="font-semibold subheading-5">
                    Daftar Catatan
                </h3>
            </div>
        </div>
        <livewire:dashboard.catatan.item.table />
    </div>
</div>
