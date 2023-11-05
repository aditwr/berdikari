<div class="">
    <div class="overflow-hidden bg-white rounded shadow-sm">
        <div class="">
            <div class="">
                <div class="flex flex-col w-full overflow-x-auto">
                    <table class="w-full overflow-x-auto text-sm font-normal text-left">
                        <thead class="overflow-hidden rounded">
                            <tr class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                <th scope="col" class="w-8 py-3 text-center">No</th>
                                <th scope="col" class="w-64 py-3 pl-1">Nama Catatan</th>
                                <th scope="col" class="w-32 py-3 pl-2">Jumlah Catatan</th>
                                <th scope="col" class="w-32 py-3 pl-2">Tanggal dibuat</th>
                                <th scope="col" class="px-2 py-3">Keterangan</th>
                                @if (auth()->user()->can('edit-kategori-catatan') ||
                                        auth()->user()->can('hapus-kategori-catatan'))
                                    <th scope="col" class="w-32 px-2 py-3 text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($daftarJenisCatatan)
                                @foreach ($daftarJenisCatatan as $jenisCatatan)
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                        <td
                                            class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="flex items-center w-64 py-2 pl-1 whitespace-pre-wrap">
                                            <p class="font-medium text-dark-secondary">{{ $jenisCatatan->nama }}</p>
                                        </td>
                                        <th scope="col" class="w-32 py-3 pl-2">{{ $jenisCatatan->jumlah_item }}
                                            catatan</th>
                                        <td class="w-32 py-2 pl-2 font-normal whitespace-nowrap">
                                            {{-- format date : date_format --}}
                                            {{ date_format($jenisCatatan->created_at, 'd M Y') }}
                                        </td>
                                        <td class="px-2 py-2 whitespace-nowrap">
                                            <div class="space-y-2">
                                                <button type="button" class="text-info-700 btn-secondary-small"
                                                    data-te-toggle="modal"
                                                    data-te-target="#keteranganjenisCatatan{{ $jenisCatatan->id }}"
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

                                        </td>
                                        <div data-te-modal-init
                                            class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                            id="keteranganjenisCatatan{{ $jenisCatatan->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                            <div data-te-modal-dialog-ref
                                                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                                <div
                                                    class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                                    <div
                                                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                            id="exampleModalScrollableLabel">
                                                            Keterangan jenisCatatan
                                                        </h5>
                                                        <button type="button"
                                                            class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                            data-te-modal-dismiss aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="relative p-4 text-sm">
                                                        <p>{{ $jenisCatatan->keterangan }}</p>
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
                                        <td class="w-32 py-2 pl-2 text-sm whitespace-nowrap ">
                                            @can('edit-kategori-catatan')
                                                <button type="button" wire:click="setEdit({{ $jenisCatatan }})"
                                                    class="text-warning-700 bg-warning-200 btn-secondary-small"
                                                    data-te-toggle="modal" data-te-target="#editjenisCatatanModal"
                                                    data-te-ripple-init data-te-ripple-color="light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="p-1 rounded-full bg-warning-300"
                                                        viewBox="0,0,256,256" style="fill:#000000;">
                                                        <g fill="#7e5e00" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                            font-family="none" font-weight="none" font-size="none"
                                                            text-anchor="none" style="mix-blend-mode: normal">
                                                            <g transform="scale(10.66667,10.66667)">
                                                                <path
                                                                    d="M18.41406,2c-0.25587,0 -0.51203,0.09747 -0.70703,0.29297l-1.70703,1.70703l4,4l1.70703,-1.70703c0.391,-0.391 0.391,-1.02406 0,-1.41406l-2.58594,-2.58594c-0.1955,-0.1955 -0.45116,-0.29297 -0.70703,-0.29297zM14.5,5.5l-11.5,11.5v4h4l11.5,-11.5z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </button>
                                            @endcan
                                            @can('hapus-kategori-catatan')
                                                <button type="button" class="bg-danger-200 btn-secondary-small"
                                                    wire:click="$set('deleteId', {{ $jenisCatatan->id }})"
                                                    data-te-toggle="modal"
                                                    data-te-target="#deletejenisCatatanModal{{ $jenisCatatan->id }}"
                                                    data-te-ripple-init data-te-ripple-color="light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="p-1 rounded-full bg-danger-300"
                                                        viewBox="0,0,256,256" style="fill:#000000;">
                                                        <g fill="#850000" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt"
                                                            stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
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
                                        {{-- delete confirm modal --}}
                                        <div data-te-modal-init wire:ignore
                                            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                            id="deletejenisCatatanModal{{ $jenisCatatan->id }}" tabindex="-1"
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <!--Modal body-->
                                                    <div class="relative p-4">
                                                        <p>Apakah anda yakin ingin menghapus Jenis Catatan "<span
                                                                class="font-medium">{{ $jenisCatatan->nama }}</span>"?
                                                        </p>
                                                    </div>
                                                    <!--Modal footer-->
                                                    <div
                                                        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">

                                                        <button type="button"
                                                            class="inline-block rounded bg-danger-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-danger-700 transition duration-150 ease-in-out hover:bg-danger-accent-100 focus:bg-danger-accent-100 focus:outline-none focus:ring-0 active:bg-danger-accent-200"
                                                            data-te-modal-dismiss data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            Batal
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
                                        <p class="font-medium text-center text-gray-500">Tidak ada jenis
                                            Jenis Catatan apapun</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{-- edit item modal --}}
                    <div data-te-modal-init wire:ignore
                        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="editjenisCatatanModal" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable"
                        aria-modal="true" role="dialog" data-te-backdrop="static" data-te-keyboard="false">
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
                                            Ubah Data Jenis Catatan
                                        </h5>
                                        {{-- <h6 class="text-dark-secondary">untuk jenisCatatan nama jenisCatatan --}}
                                        </h6>
                                    </div>
                                    <!--Close button-->
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

                                <livewire:dashboard.catatan.kelola.edit />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- pagination --}}
    <div class="px-2 mt-4 mb-3">
        {{ $daftarJenisCatatan->links() }}
    </div>
</div>
