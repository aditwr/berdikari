<div class="bg-white rounded-lg w-full h-full shadow py-6 px-4 md:py-6 md:px-8">
    <div class="w-full flex flex-col sm:flex-row sm:items-center sm:gap-x-4 gap-y-2">
        {{-- illustration --}}
        <div class="h-20 w-full sm:w-32 overflow-hidden flex justify-center ">
            <img src="{{ asset('assets/icons/inventory.png') }}" alt="illustration" class="object-contain">
        </div>
        <h class="text-center heading-5 font-medium mb-2 sm:hidden">Inventaris</h>
        <div class="w-full ">
            <h class="hidden sm:block w-full subheading-4 text-center sm:text-left font-medium mb-3">Inventaris</h>
            {{-- container --}}
            <div class="">
                <div class="" wire:ignore>
                    <select id="select-kategori-inventaris" class="w-full"
                        onchange="window.dispatchEvent(new CustomEvent('kateori-inventaris-aktif-berubah', { detail: { value : this.value } }))"
                        data-te-select-init>
                        @foreach ($inventariss as $inventaris)
                            <option class="line-clamp-1 w-full" value="{{ $inventaris->id }}">{{ $inventaris->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full grid gap-2 sm:gap-4 grid-row-3 sm:grid-cols-3 mt-4">
        <div class="bg-success-100 rounded-lg w-full flex flex-col px-4 py-4">
            <p class="text-center subheading-6 font-medium mb-1 md:mb-2">Baik</p>
            <div class="flex gap-x-2 md:flex-col md:items-center justify-center items-baseline w-full">
                <div class="flex items-baseline gap-x-2">
                    <img src="{{ asset('assets/icons/accept.png') }}" alt="check icon" class="h-6 w-auto">
                    <p class="heading-3 text-success-700">{{ $baik }}</p>
                </div>
                <span class="font-medium text-success-600">Barang</span>
            </div>
        </div>
        <div class="bg-warning-100 rounded-lg w-full flex flex-col px-4 py-4">
            <p class="text-center subheading-6 font-medium mb-1 md:mb-2">Perbaiki</p>
            <div class="flex gap-x-2 md:flex-col md:items-center justify-center items-baseline w-full">
                <div class="flex items-baseline gap-x-2">
                    <img src="{{ asset('assets/icons/warning.png') }}" alt="check icon" class="h-7 w-auto">
                    <p class="heading-3 text-warning-700">{{ $perlu_perbaikan }}</p>
                </div>
                <span class="font-medium text-warning-600">Barang</span>
            </div>
        </div>
        <div class="bg-danger-100 rounded-lg w-full flex flex-col px-4 py-4">
            <p class="text-center subheading-6 font-medium mb-1 md:mb-2">Rusak</p>
            <div class="flex gap-x-2 md:flex-col md:items-center justify-center items-baseline w-full">
                <div class="flex items-baseline gap-x-2">
                    <img src="{{ asset('assets/icons/cross.png') }}" alt="check icon" class="h-7 w-auto">
                    <p class="heading-3 text-danger-700">{{ $rusak }}</p>
                </div>
                <span class="font-medium text-danger-600">Barang</span>
            </div>
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
