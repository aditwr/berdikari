<div class="bg-white rounded-lg h-full shadow py-6 px-4 md:py-6 md:px-8">
    <div class="w-full flex flex-col sm:flex-row sm:items-center sm:gap-x-4 gap-y-2">
        {{-- illustration --}}
        <div class="h-20 w-full sm:w-32 overflow-hidden flex justify-center ">
            <img src="{{ asset('assets/icons/note.png') }}" alt="illustration" class="object-contain">
        </div>
        <h class="text-center heading-5 font-medium mb-2 sm:hidden">Catatan</h>
        <div class="w-full">
            <h class="hidden sm:block w-full subheading-4 text-center sm:text-left font-medium mb-3">Catatan</h>
            {{-- container --}}
            <div class="">
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
        </div>
    </div>
    <div class="w-full  mt-4">
        <p class="subheading-6 font-medium text-dark-tertiary">Catatan bulan ini</p>
        <div class=" px-4 pt-4">
            <p class="heading-3 text-success-700 text-center">{{ $jumlah_catatan_bulan_ini }}</p>
            <p class="subheading-5 text-center font-medium text-dark-secondary">Catatan Baru</p>
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
