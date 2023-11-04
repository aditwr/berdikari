<div>
    <div class="w-full 2xl:w-9/12">
        {{-- toast --}}
        @if ($notification['status'])
            <div class="pointer-events-auto mx-auto mb-4 hidden w-full max-w-full rounded-lg bg-success-100 bg-clip-padding text-sm text-success-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
                id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-te-autohide="false"
                data-te-toast-init data-te-toast-show>
                <div
                    class="flex items-center justify-between rounded-t-lg border-b-2 border-success/20 bg-success-100 bg-clip-padding px-4 pb-2 pt-2.5">
                    <p class="flex items-center font-bold text-success-700">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                            class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                            </path>
                        </svg>
                        {{ $notification['title'] }}
                    </p>
                    <div class="flex items-center">
                        <button type="button" wire:click="$set('notification.status', false)"
                            class="box-content ml-2 border-none rounded-none opacity-80 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            aria-label="Close">
                            <span
                                class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="px-4 py-4 break-words rounded-b-lg bg-success-100 text-success-700">
                    {!! $notification['message'] !!}
                </div>
            </div>
        @endif
    </div>
    <div class="">
        <div class="w-full 2xl:w-9/12">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-3">
                    <h3 class="font-semibold subheading-5">
                        @if ($bulanAktif == date('m') && $tahunAktif == date('Y'))
                            Riwayat Pemasukan Bulan Ini
                        @else
                            Riwayat Pemasukan Bulan {{ config('constants.bulan.' . $bulanAktif) }} {{ $tahunAktif }}
                        @endif
                    </h3>
                </div>
                <div class="flex w-full md:max-w-min gap-x-8">
                    <div class="w-full md:w-96">
                        <div class="mb-3">
                            <div class="relative flex flex-wrap items-stretch w-full mb-4 bg-white">
                                <input type="search" wire:model="search"
                                    class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                    placeholder="Cari" aria-label="Search" aria-describedby="button-addon1" />

                                <!--Search button-->
                                <button
                                    class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                    type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <th scope="col" class="py-3 pl-2 w-36">Saldo Awal</th>
                                        <th scope="col" class="py-3 pl-2 w-36">Saldo Akhir</th>
                                        <th scope="col" class="px-2 py-3">Keterangan</th>
                                        @if (auth()->user()->can('edit-pemasukan') ||
                                                auth()->user()->can('hapus-pemasukan'))
                                            <th scope="col" class="w-32 px-2 py-3 text-center">Aksi</th>
                                        @endif
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
                                                    {{ date_format(date_create($pemasukan->created_at), 'D, d F Y') }}
                                                </td>
                                                <td
                                                    class="py-2 pl-2 text-sm font-medium w-36 whitespace-nowrap text-primary-700">
                                                    Rp{{ number_format($pemasukan->saldo_awal, 0, ',', '.') }},-
                                                </td>
                                                <td
                                                    class="py-2 pl-2 text-sm font-medium w-36 whitespace-nowrap text-primary-700">
                                                    Rp{{ number_format($pemasukan->saldo_akhir, 0, ',', '.') }},-
                                                </td>
                                                <td class="relative px-2 py-2 whitespace-nowrap">
                                                    <div class="">
                                                        <div class="space-y-2">
                                                            <button type="button"
                                                                class="text-info-700 btn-secondary-small"
                                                                data-te-toggle="modal"
                                                                data-te-target="#keteranganPemasukan"
                                                                data-te-ripple-init data-te-ripple-color="light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="24" height="24" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12,2C6.477,2,2,6.477,2,12s4.477,10,10,10s10-4.477,10-10S17.523,2,12,2z M13,17h-2v-6h2V17z M13,9h-2V7h2V9z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="w-32 py-2 pl-2 text-sm whitespace-nowrap ">
                                                    @can('edit-pemasukan')
                                                        <button type="button" wire:click="setUpdate({{ $pemasukan }})"
                                                            class="text-warning-700 bg-warning-200 btn-secondary-small"
                                                            data-te-toggle="modal" data-te-target="#editModalPemasukan"
                                                            data-te-ripple-init data-te-ripple-color="light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="24" height="24"
                                                                class="p-1 rounded-full bg-warning-300"
                                                                viewBox="0,0,256,256" style="fill:#000000;">
                                                                <g fill="#7e5e00" fill-rule="nonzero" stroke="none"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    stroke-linejoin="miter" stroke-miterlimit="10"
                                                                    stroke-dasharray="" stroke-dashoffset="0"
                                                                    font-family="none" font-weight="none"
                                                                    font-size="none" text-anchor="none"
                                                                    style="mix-blend-mode: normal">
                                                                    <g transform="scale(10.66667,10.66667)">
                                                                        <path
                                                                            d="M18.41406,2c-0.25587,0 -0.51203,0.09747 -0.70703,0.29297l-1.70703,1.70703l4,4l1.70703,-1.70703c0.391,-0.391 0.391,-1.02406 0,-1.41406l-2.58594,-2.58594c-0.1955,-0.1955 -0.45116,-0.29297 -0.70703,-0.29297zM14.5,5.5l-11.5,11.5v4h4l11.5,-11.5z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    @endcan
                                                    @can('hapus-pemasukan')
                                                        <button type="button"
                                                            wire:click="$set('deleteId', {{ $pemasukan->id }})"
                                                            class="bg-danger-200 btn-secondary-small"
                                                            data-te-toggle="modal"
                                                            data-te-target="#modalDeletePemasukan{{ $pemasukan->id }}"
                                                            data-te-ripple-init data-te-ripple-color="light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="24" height="24"
                                                                class="p-1 rounded-full bg-danger-300"
                                                                viewBox="0,0,256,256" style="fill:#000000;">
                                                                <g fill="#850000" fill-rule="nonzero" stroke="none"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    stroke-linejoin="miter" stroke-miterlimit="10"
                                                                    stroke-dasharray="" stroke-dashoffset="0"
                                                                    font-family="none" font-weight="none"
                                                                    font-size="none" text-anchor="none"
                                                                    style="mix-blend-mode: normal">
                                                                    <g transform="scale(10.66667,10.66667)">
                                                                        <path
                                                                            d="M10,2l-1,1h-6v2h18v-2h-6l-1,-1zM4.36523,7l1.52734,13.26367c0.132,0.99 0.98442,1.73633 1.98242,1.73633h8.24805c0.998,0 1.85138,-0.74514 1.98438,-1.74414l1.52734,-13.25586z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    @endcan
                                                </td>
                                                <div data-te-modal-init
                                                    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                                    id="keteranganPemasukan" tabindex="-1"
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
                                                            <div class="relative w-full p-4 px-3 text-sm">
                                                                <div class="w-full h-32">
                                                                    {{ $pemasukan->keterangan }}
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                                                <button type="button"
                                                                    class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                                    data-te-modal-dismiss data-te-ripple-init
                                                                    data-te-ripple-color="light">
                                                                    Tutup
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- delete confirm modal --}}
                                                <div data-te-modal-init wire:ignore
                                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                                    id="modalDeletePemasukan{{ $pemasukan->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalCenterTitle" aria-modal="true"
                                                    role="dialog">
                                                    <div data-te-modal-dialog-ref
                                                        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                                        <div
                                                            class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                                            <div
                                                                class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                                <!--Modal title-->
                                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                                    id="exampleModalScrollableLabel">
                                                                    Konfirmasi Penghapusan
                                                                </h5>
                                                                <!--Close button-->
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

                                                            <!--Modal body-->
                                                            <div class="relative p-4" wire:>
                                                                <p>Apakah anda yakin ingin menghapus pemasukan "<span
                                                                        class="font-medium">{{ $pemasukan->judul }}</span>"?
                                                                </p>
                                                            </div>
                                                            <!--Modal footer-->
                                                            <div
                                                                class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">

                                                                <button type="button"
                                                                    class="inline-block rounded bg-danger-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-danger-700 transition duration-150 ease-in-out hover:bg-danger-accent-100 focus:bg-danger-accent-100 focus:outline-none focus:ring-0 active:bg-danger-accent-200"
                                                                    data-te-modal-dismiss data-te-ripple-init
                                                                    data-te-ripple-color="light">
                                                                    Cancel
                                                                </button>
                                                                <button type="button" wire:click="deleteItem"
                                                                    class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                                    data-te-ripple-init data-te-ripple-color="light"
                                                                    data-te-modal-dismiss>
                                                                    Hapus
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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



                            {{-- edit item modal --}}
                            <div data-te-modal-init wire:ignore
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="editModalPemasukan" tabindex="-1"
                                aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog"
                                data-te-backdrop="static" data-te-keyboard="false">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div
                                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                        <div
                                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <div class="">
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="exampleModalCenteredScrollableLabel">
                                                    Ubah Catatan Pemasukan
                                                </h5>
                                                <h6 class="text-dark-secondary">untuk keuangan
                                                    {{ $dataKeuanganAktif['nama'] }}
                                                </h6>
                                            </div>
                                            <!--Close button-->
                                            <button type="button"
                                                class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                data-te-modal-dismiss aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <livewire:dashboard.keuangan.pemasukan.edit-form />
                                    </div>
                                </div>
                            </div>
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
