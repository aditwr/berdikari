<div class="bg-white rounded-lg w-full h-full shadow py-4 px-4 md:py-6 md:px-8">
    <h class="subheading-5 font-medium mb-3">Inventaris</h>
    {{-- container --}}
    <div class="mt-2">
        <div class="" wire:ignore>
            <select id="select-kategori-inventaris"
                onchange="window.dispatchEvent(new CustomEvent('kateori-inventaris-aktif-berubah', { detail: { value : this.value } }))"
                data-te-select-init>
                @foreach ($inventariss as $inventaris)
                    <option value="{{ $inventaris->id }}">{{ $inventaris->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full grid gap-2 sm:gap-4 grid-cols-3 md:grid-cols-3 mt-4">
        <div class="bg-success-100 rounded-lg w-full px-4 py-4">
            <p class="subheading-5 text-center font-medium mb-2">Baik</p>
            <p class="heading-3 text-success-700 text-center">{{ $baik }}</p>
        </div>
        <div class="bg-warning-100 rounded-lg w-full px-4 py-4">
            <p class="subheading-5 text-center font-medium mb-2">Perlu Perbaikan</p>
            <p class="heading-3 text-center">{{ $perlu_perbaikan }}</p>
        </div>
        <div class="bg-danger-100 rounded-lg w-full px-4 py-4">
            <p class="subheading-5 text-center font-medium mb-2">Rusak</p>
            <p class="heading-3 text-danger-700 text-center">{{ $rusak }}</p>
        </div>
    </div>
</div>

@push('script_after')
    <script>
        window.addEventListener('kateori-inventaris-aktif-berubah', (event) => {
            Livewire.emit('kategoriInventarisAktifBerubah', event.detail.value)
        });
    </script>
@endpush
