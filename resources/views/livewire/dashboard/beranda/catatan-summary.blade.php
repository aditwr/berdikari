<div class="bg-white rounded-lg h-full shadow py-4 px-4 md:py-6 md:px-8">
    <h class="subheading-5 font-medium mb-3">Catatan</h>
    {{-- container --}}
    <div class="mt-2">
        <div class="" wire:ignore>
            <select id="select-kategori-inventaris"
                onchange="window.dispatchEvent(new CustomEvent('kateori-catatan-aktif-berubah', { detail: { value : this.value } }))"
                data-te-select-init>
                @foreach ($kategoriCatatan as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full  mt-4">
        <p class="subheading-6 font-medium">Catatan bulan ini</p>
        <div class=" px-4 py-4">
            <p class="heading-3 text-success-700 text-center">{{ $jumlah_catatan_bulan_ini }}</p>
            <p class="subheading-5 text-center font-medium mb-2">Catatan Baru</p>
        </div>
    </div>
</div>

@push('script_after')
    <script>
        window.addEventListener('kateori-catatan-aktif-berubah', (event) => {
            Livewire.emit('kategoriCatatanAktifBerubah', event.detail.value)
        });
    </script>
@endpush
