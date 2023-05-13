<div class="dashboard-padding-responsive">
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Keuangan</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Pengeluaran</a>
        </x-dashboard.breadcrumb>
    </div>
    <div class="flex flex-col mb-8 md:flex-row md:items-end gap-x-8 gap-y-2">
        <div class="flex flex-col md:flex-row gap-y-4 gap-x-8">
            <livewire:dashboard.keuangan.partials.select>
                <div class="flex gap-x-8">
                    {{-- select bulan --}}
                    <div class="">
                        <h3 class="mb-2 font-medium caption">Pilih Bulan</h3>
                        <div class="">
                            <select wire:model='bulanAktif' class="rounded">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    {{-- select tahun --}}
                    <div class="">
                        <h3 class="mb-2 font-medium caption">Pilih Tahun</h3>
                        <div class="">
                            <select wire:model='tahunAktif' class="rounded ">
                                {{-- buat list option tahun sekarang dan 10 tahun kebelakang --}}
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="mb-6">
        <livewire:dashboard.keuangan.pengeluaran.create>
    </div>
    <livewire:dashboard.keuangan.pengeluaran.table>
</div>
