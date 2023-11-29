<div class="bg-white rounded-lg w-full h-full shadow py-6 px-4 md:py-8 md:px-8">
    <div class="mb-4 flex gap-x-2">
        <img src="{{ asset('assets/icons/bar-graph.png') }}" alt="" class="h-6 w-auto">
        {{-- <img src="https://img.icons8.com/fluency/48/combo-chart--v1.png" class="h-10 w-auto" alt="combo-chart--v1" /> --}}
        <h class="heading-6">Grafik Keuangan Bulan ini</h>
    </div>
    <div class="">
        {{-- select --}}
        <div class="flex justify-between lg:justify-start">
            <div class="">
                <h3 class="mb-2 font-medium caption">Pilih Keuangan</h3>
                <div class="flex justify-start ">
                    <div class="w-64 mb-3 xl:w-64">
                        <select wire:model='keuanganAktif' class="w-full overflow-hidden rounded">
                            @foreach ($keuangans as $keuangan)
                                <option class="" value="{{ $keuangan->slug }}">
                                    {{ $keuangan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:dashboard.line-chart id_chart="grafik_keuangan_bulan_ini" :label="$dataKeuanganAktif->nama"
        bulanAktif="{{ $bulanAktif }}" tahunAktif="{{ $tahunAktif }}" container_class="w-full h-64 lg:h-72"
        :daftar_tanggal_bulan_ini="$daftar_tanggal_bulan_ini" :nominal_keuangan_bulan_ini="$nominal_keuangan_bulan_ini">
</div>
