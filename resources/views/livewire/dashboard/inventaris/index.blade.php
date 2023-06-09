<div class="w-full">
    <div class="flex flex-col items-baseline mb-3 gap-y-4">
        <h3 class="heading-5 text-dark-primary">Daftar Inventaris</h3>
        @if (!$showCreateForm)
            <div class="">
                <button class="btn-primary" wire:click="showCreate">Buat Inventaris Baru</button>
            </div>
        @endif
    </div>
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
                    {!! $notification['title'] !!}
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
    @if ($showCreateForm)
        <div
            class="w-full md:w-96 block rounded-lg bg-white transition-all p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <div class="flex justify-between mb-4">
                <h5 class="font-medium subheading-4">Buat Inventaris Baru</h5>
                {{-- close button --}}
                <button type="button" class="" wire:click="$set('showCreateForm', false)">
                    <svg class="w-5 h-5 text-gray-400 hover:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="mb-4">
                <label for="nama-inventoris" class="block mb-2 font-medium caption text-dark-secondary">Nama
                    Inventoris</label>
                <input type="text" wire:model="namaInventoris" id="nama-inventoris"
                    class="block w-full transition-all rounded border-neutral-300">
                @error('namaInventoris')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Penanggung
                    Jawab</label>
                <input type="text" wire:model="penanggungJawab" id="judul-catatan"
                    class="block w-full transition-all rounded border-neutral-300">
                @error('penanggungJawab')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Keterangan</label>
                <textarea wire:model="keterangan" class="block w-full transition-all rounded border-neutral-300"></textarea>
                @error('keterangan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" wire:click="store"
                @if ($canBeStored) class="btn-primary"
            @else
            type="button"
                    class="pointer-events-none inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] disabled:opacity-70 dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    disabled @endif>Simpan</button>
        </div>
    @endif
    @if ($showEditForm)
        <div
            class="w-full md:w-96 block rounded-lg bg-white transition-all p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <div class="flex justify-between mb-4">
                <h5 class="font-medium subheading-4">Edit Inventaris</h5>
                {{-- close button --}}
                <button type="button" class="" wire:click="$set('showEditForm', false)">
                    <svg class="w-5 h-5 text-gray-400 hover:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="mb-4">
                <label for="nama-inventoris" class="block mb-2 font-medium caption text-dark-secondary">Nama
                    Inventoris</label>
                <input type="text" wire:model="namaInventorisEdit" id="nama-inventoris"
                    class="block w-full transition-all rounded border-neutral-300">
                @error('namaInventorisEdit')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Penanggung
                    Jawab</label>
                <input type="text" wire:model="penanggungJawabEdit" id="judul-catatan"
                    class="block w-full transition-all rounded border-neutral-300">
                @error('penanggungJawabEdit')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Keterangan</label>
                <textarea wire:model="keteranganEdit" class="block w-full transition-all rounded border-neutral-300"></textarea>
                @error('keteranganEdit')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" wire:click="update"
                @if ($canBeUpdated) class="btn-primary"
            @else
            type="button"
                    class="pointer-events-none inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] disabled:opacity-70 dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    disabled @endif>Ubah</button>
        </div>
    @endif
    <hr class="my-6">
    <div class="mt-6">
        <div class="grid grid-cols-1 mt-4 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-4 gap-y-3">
            @foreach ($jenisInventaris as $jenis)
                <div
                    class="flex flex-col justify-between rounded-lg bg-white transition-all p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div class="">
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            {{ $jenis->nama }}
                        </h5>
                        <p class="text-sm text-neutral-600 dark:text-neutral-200">
                            {{ $jenis->keterangan }}
                        </p>
                        <p class="mt-1 text-sm">
                            Penanggung Jawab : <span class="font-semibold">{{ $jenis->penanggung_jawab }}</span>
                        </p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('dashboard.inventaris.daftar-barang', $jenis->id) }}"
                            class="btn-primary">Lihat</a>
                        <div class="flex gap-x-2">
                            <button type="button" wire:click="showEdit({{ $jenis->id }})"
                                class="text-warning-700 bg-warning-200 btn-secondary-small" data-te-toggle="modal"
                                data-te-target="#editModalPengeluaran" data-te-ripple-init
                                data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                    height="24" class="p-1 rounded-full bg-warning-300" viewBox="0,0,256,256"
                                    style="fill:#000000;">
                                    <g fill="#7e5e00" fill-rule="nonzero" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                        font-weight="none" font-size="none" text-anchor="none"
                                        style="mix-blend-mode: normal">
                                        <g transform="scale(10.66667,10.66667)">
                                            <path
                                                d="M18.41406,2c-0.25587,0 -0.51203,0.09747 -0.70703,0.29297l-1.70703,1.70703l4,4l1.70703,-1.70703c0.391,-0.391 0.391,-1.02406 0,-1.41406l-2.58594,-2.58594c-0.1955,-0.1955 -0.45116,-0.29297 -0.70703,-0.29297zM14.5,5.5l-11.5,11.5v4h4l11.5,-11.5z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button type="button" wire:click="$set('deleteId', {{ $jenis->id }})"
                                class="bg-danger-200 btn-secondary-small" data-te-toggle="modal"
                                data-te-target="#confirmDeleteModal{{ $jenis->id }}" data-te-ripple-init
                                data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                    height="24" class="p-1 rounded-full bg-danger-300" viewBox="0,0,256,256"
                                    style="fill:#000000;">
                                    <g fill="#850000" fill-rule="nonzero" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
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
                        </div>

                        {{-- delete modal --}}
                        <div data-te-modal-init wire:ignore
                            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="confirmDeleteModal{{ $jenis->id }}" tabindex="-1"
                            aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
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
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!--Modal body-->
                                    <div class="relative p-4" wire:>
                                        <p>Apakah anda yakin ingin menghapus inventoris "<span
                                                class="font-medium">{{ $jenis->nama }}</span>"?
                                        </p>
                                    </div>
                                    <!--Modal footer-->
                                    <div
                                        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">

                                        <button type="button"
                                            class="inline-block rounded bg-danger-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-danger-700 transition duration-150 ease-in-out hover:bg-danger-accent-100 focus:bg-danger-accent-100 focus:outline-none focus:ring-0 active:bg-danger-accent-200"
                                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                            Cancel
                                        </button>
                                        <button type="button" wire:click="deleteItem"
                                            class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-ripple-init data-te-ripple-color="light" data-te-modal-dismiss>
                                            Hapus
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end delete modal --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
