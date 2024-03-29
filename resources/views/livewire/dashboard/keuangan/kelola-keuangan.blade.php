<div>
    <div class="dashboard-padding-responsive">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Keuangan</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Laporan Keuangan</a>
        </x-dashboard.breadcrumb>

        <div class="flex flex-col w-full mb-6 md:flex-row md:gap-x-8 xl:gap-x-12 2xl:gap-x-24">
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
            {{-- info --}}
            <div class="flex flex-col flex-wrap justify-between w-full gap-y-6 2xl:flex-row">
                <div class="flex flex-col lg:flex-row gap-x-8 gap-y-2">
                    <div class="flex px-4 py-3 bg-white rounded shadow gap-x-4">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/icons/money.png') }}" alt="" class="h-12 w-auto">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="font-medium text-dark-secondary caption">
                                {{ $dataKeuanganAktif->nama }}

                            </h6>
                            <span class="text-xs text-dark-secondary">Saat ini</span>
                            <h4 class="heading-6 text-cyan-600">
                                <span class="text-sm font-medium">Rp</span>
                                {{ number_format($statistikKeuanganAktif['totalKeuanganSaatIni'], 0, ',', '.') }}
                            </h4>
                        </div>
                    </div>
                    {{-- item --}}
                    <div class="flex px-4 py-3 bg-white rounded shadow gap-x-4">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/icons/income.png') }}" alt="" class="h-12 w-auto">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="font-medium text-dark-secondary caption">Pemasukan</h6>
                            <span class="text-xs text-dark-secondary">
                                Bulan ini
                            </span>
                            <h4 class="font-medium text-green-600 subheading-5">
                                <span class="text-sm font-medium">Rp</span>
                                {{ number_format($statistikKeuanganAktif['totalPemasukanSatuBulan'], 0, ',', '.') }}
                            </h4>
                        </div>
                    </div>
                    <div class="flex px-4 py-3 bg-white rounded shadow gap-x-4">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/icons/expenses.png') }}" alt="" class="h-12 w-auto">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="font-medium text-dark-secondary caption">Pengeluaran</h6>
                            <span class="text-xs text-dark-secondary">
                                Bulan ini
                            </span>
                            <h4 class="font-medium text-red-600 subheading-5">
                                <span class="text-sm font-medium">Rp</span>
                                {{ number_format($statistikKeuanganAktif['totalPengeluaranSatuBulan'], 0, ',', '.') }}
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- button ringkasan keuangan bulan ini --}}
                <div class="">
                    <!-- Button trigger modal -->
                    <button type="button"
                        class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init
                        data-te-ripple-color="light">
                        Ringkasan Keuangan
                    </button>

                    <!-- Modal Ringkasan Keuangan-->
                    <div data-te-modal-init
                        class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div data-te-modal-dialog-ref
                            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                            <div
                                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                <div
                                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                        id="exampleModalLabel">
                                        Ringkasan Keuangan
                                    </h5>
                                    <button type="button"
                                        class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                        data-te-modal-dismiss aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div data-te-modal-body-ref class="relative p-4">
                                    <div class="">
                                        <livewire:components.doughnut-chart id_chart="persentase_semua_keuangan"
                                            container_class="w-full h-64" label="Saldo" :labels="$ringkasanKeuangan['labels']"
                                            :data="$ringkasanKeuangan['data']">
                                    </div>
                                    <div class="">
                                        <div class="text-center">
                                            <h6 class="mt-2 mb-2 font-medium subheading-6 text-dark-secondary">Total
                                                Saldo
                                                Keuangan
                                            </h6>
                                            <div class="flex gap-x-1 items-center justify-center">
                                                <div class="">
                                                    <img src="https://img.icons8.com/fluency/48/cheap-2.png"
                                                        alt="cheap-2" class="h-8 w-auto" />
                                                </div>
                                                <h3 class="">
                                                    <span class="font-medium text-primary-500 text-lg">Rp</span>
                                                    <span
                                                        class="font-semibold text-cyan-700 heading-4 tracking-tight">{{ number_format($total_saldo_karangtaruna, 0, ',', '.') }}</span>
                                                </h3>
                                            </div>
                                        </div>
                                        {{-- daftar keuangan --}}
                                        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-3 ">
                                            @foreach ($daftar_keuangan as $keuangan)
                                                <div class="px-2 py-3 bg-white rounded-md shadow-lg">
                                                    <img src="{{ asset('assets/icons/money.png') }}" alt=""
                                                        class="h-8 w-auto">
                                                    <div class="mt-1">
                                                        <h6 class="text-sm font-medium text-dark">
                                                            {{ $keuangan->nama }}
                                                        </h6>
                                                        <h3 class="font-medium subheading-5 text-cyan-700">
                                                            <span class="text-sm font-medim">Rp</span>
                                                            {{ number_format($keuangan->saldo, 0, ',', '.') }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                    <button type="button"
                                        class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="flex flex-col w-full mt-12 mb-12 lg:flex-row">
            <div class="lg:w-8/12">
                <div class="flex w-full mb-3 gap-x-8">
                    {{-- select bulan --}}
                    <div class="">
                        <h3 class="mb-2 font-medium caption">Pilih Bulan</h3>
                        <div class="mb-3 xl:w-40">
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
                        <div class="mb-3 xl:w-40">
                            <select wire:model='tahunAktif' class="rounded ">
                                {{-- buat list option tahun sekarang dan 10 tahun kebelakang --}}
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                {{-- chart --}}
                <div class="flex gap-x-2">
                    <div class="">
                        <img src="{{ asset('assets/icons/bar-graph.png') }}" alt="" class="h-6 w-auto">
                    </div>
                    <h3 class="font-semibold subheading-5">
                        @if ($bulanAktif == date('m') && $tahunAktif == date('Y'))
                            Grafik Keuangan Bulan Ini
                        @else
                            Grafik Keuangan Bulan {{ config('constants.bulan.' . $bulanAktif) }} {{ $tahunAktif }}
                        @endif
                    </h3>
                </div>
                <livewire:dashboard.line-chart id_chart="grafik_keuangan_bulan_ini" :label="$dataKeuanganAktif->nama"
                    bulanAktif="{{ $bulanAktif }}" tahunAktif="{{ $tahunAktif }}"
                    container_class="w-full h-64 lg:h-72" :daftar_tanggal_bulan_ini="$daftar_tanggal_bulan_ini" :nominal_keuangan_bulan_ini="$nominal_keuangan_bulan_ini">

            </div>
            <div class="flex mt-4 lg:justify-end lg:w-4/12 md:mt-6 lg:mt-0 xl:pl-4">
                <div class="px-4 sm:px-6 py-3 bg-white border-l-2 rounded shadow-md w-96 border-primary-400">
                    <div class="flex items-center py-4 gap-x-2">
                        <div class="">
                            <img src="{{ asset('assets/icons/money2.png') }}" alt="" class="h-8 w-auto">
                        </div>
                        <h5 class="font-semibold subheading-5 text-primary-900">
                            @if ($bulanAktif == date('m') && $tahunAktif == date('Y'))
                                Keuangan Bulan Ini
                            @else
                                Keuangan Bulan {{ config('constants.bulan.' . $bulanAktif) }} {{ $tahunAktif }}
                            @endif
                        </h5>
                        <h3 class="font-semibold subheading-5">

                        </h3>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-between w-full py-2">
                            <span class="font-medium caption">
                                @if ($tahunAktif == date('Y'))
                                    @if ($bulanAktif < date('m'))
                                        Saldo Akhir Bulan :
                                    @elseif($bulanAktif == date('m'))
                                        Saldo Keuangan :
                                    @else
                                        Saldo :
                                    @endif
                                @else
                                    Saldo Akhir Bulan :
                                @endif
                            </span>
                            <span class="font-medium subheading-5 text-cyan-600">
                                <span class="text-sm font-medium">Rp</span>
                                {{ number_format($saldo_sampai_pada_bulan_aktif, 0, ',', '.') }}
                            </span>
                        </div>
                        <hr class="mb-4">
                        <div class="py-2">
                            <div class="flex justify-between w-full">
                                <span class="font-medium caption">Pemasukan : </span>
                                <span class="font-medium subheading-5 text-success-600">
                                    <span class="text-sm font-medium">Rp</span>
                                    {{ number_format($nominalPemasukanSatuBulan, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between w-full">
                                <span class="font-medium caption">Banyak Pemasukan : </span>
                                <span class="font-medium caption"><span
                                        class="mr-2 font-semibold subheading-5 text-success-600">{{ $jumlahPemasukanSatuBulan }}</span>
                                    Pemasukan</span>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="py-2">
                            <div class="flex justify-between w-full">
                                <span class="font-medium caption">Pengeluaran : </span>
                                <span class="font-medium subheading-5 text-danger-600">
                                    <span class="text-sm font-medium">Rp</span>
                                    {{ number_format($nominalPengeluaranSatuBulan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between w-full">
                                <span class="font-medium caption">Banyak Pengeluaran : </span>
                                <span class="font-medium caption"><span
                                        class="mr-2 font-semibold subheading-5 text-danger-600">{{ $jumlahPengeluaranSatuBulan }}</span>
                                    Pengeluaran</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tabel Pemasukan --}}
        <div class="mb-16">
            <livewire:dashboard.keuangan.pemasukan.table />
        </div>

        {{-- Tabel Pengeluaran --}}
        <div class="mb-8">
            <livewire:dashboard.keuangan.pengeluaran.table />
        </div>
    </div>

</div>
