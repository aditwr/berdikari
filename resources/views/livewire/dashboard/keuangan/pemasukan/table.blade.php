<div>
    <div class="">
        <div class="mb-3">
            <h3 class="font-semibold subheading-5">
                @if ($bulanAktif == date('m') && $tahunAktif == date('Y'))
                    Riwayat Pemasukan Bulan Ini
                @else
                    Riwayat Pemasukan Bulan {{ config('constants.bulan.' . $bulanAktif) }} {{ $tahunAktif }}
                @endif
            </h3>
        </div>
        <div class="w-full 2xl:w-8/12">
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center">No</th>
                                        <th scope="col" class="w-64 py-3 pl-1">Judul</th>
                                        <th scope="col" class="w-32 py-3 pl-2">Nominal</th>
                                        <th scope="col" class="w-32 py-3 pl-2">Tanggal</th>
                                        <th scope="col" class="py-3 pl-2 w-36">Total Kas</th>
                                        <th scope="col" class="px-2 py-3 ">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pemasukans->count() > 0)
                                        @foreach ($pemasukans as $pemasukan)
                                            <tr
                                                class="flex items-center justify-between text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-64 py-2 pl-1 whitespace-pre-wrap">
                                                    <p class="font-medium text-dark-secondary">{{ $pemasukan->judul }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-32 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        Rp{{ number_format($pemasukan->nominal, 0, ',', '.') }},-</p>
                                                </td>
                                                <td class="w-32 py-2 pl-2 font-normal whitespace-nowrap">
                                                    {{-- format date : date_format --}}
                                                    {{ date_format(date_create($pemasukan->tanggal), 'D, d F Y') }}
                                                </td>
                                                <td
                                                    class="py-2 pl-2 text-sm font-medium w-36 whitespace-nowrap text-primary-700">
                                                    Rp{{ number_format($pemasukan->total_nominal, 0, ',', '.') }},-
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap">
                                                    <div class="space-y-2">
                                                        <button type="button" class="text-info-700 btn-secondary-small"
                                                            data-te-toggle="modal"
                                                            data-te-target="#keteranganPemasukan{{ $loop->iteration }}"
                                                            data-te-ripple-init data-te-ripple-color="light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                y="0px" width="24" height="24"
                                                                fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12,2C6.477,2,2,6.477,2,12s4.477,10,10,10s10-4.477,10-10S17.523,2,12,2z M13,17h-2v-6h2V17z M13,9h-2V7h2V9z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div data-te-modal-init
                                                        class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                                        id="keteranganPemasukan{{ $loop->iteration }}" tabindex="-1"
                                                        aria-labelledby="exampleModalCenterTitle" aria-modal="true"
                                                        role="dialog">
                                                        <div data-te-modal-dialog-ref
                                                            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                                            <div
                                                                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                                                <div
                                                                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                                        id="exampleModalScrollableLabel">
                                                                        Keterangan Pemasukan
                                                                    </h5>
                                                                    <button type="button"
                                                                        class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                                        data-te-modal-dismiss aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-6 h-6">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M6 18L18 6M6 6l12 12" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="relative p-4 text-sm">
                                                                    <p>{{ $pemasukan->keterangan }}</p>
                                                                </div>
                                                                <div
                                                                    class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                                                    <button type="button"
                                                                        class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                                        data-te-modal-dismiss data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        Close
                                                                    </button>
                                                                    <button type="button"
                                                                        class="ml-1 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                                                        data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        Save changes
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Tidak ada riwayat
                                                    pemasukan</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{ $pemasukans->links() }}
            </div>
        </div>
    </div>

</div>
