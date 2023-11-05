<div>
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Galeri</a>
        </x-dashboard.breadcrumb>
    </div>
    <div class="my-2">
        @can('buat-galeri')
            @if ($tampilkanTombolUpload)
                <button wire:click="munculkanMenuUpload" class="btn-primary">
                    Upload Foto
                </button>
            @endif
        @endcan
    </div>
    <div class="mt-4">
        {{-- toast --}}
        @if ($notification['status'])
            <div class="pointer-events-auto mx-auto mb-2 mt-4 hidden w-full max-w-full rounded-lg bg-success-100 bg-clip-padding text-sm text-success-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
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

        @if ($tampilkanMenuUpload)
            {{-- card-container --}}
            <div class="w-96">
                {{-- card --}}
                <div class="px-4 py-4 bg-white rounded">
                    {{-- action --}}
                    <div class="">
                        <form wire:submit.prevent="upload">
                            <label for="formFile"
                                class="flex items-center justify-between w-full mb-2 text-neutral-700 dark:text-neutral-200">
                                <p class="">Upload
                                    Foto ke Galeri</p>
                                <button type="button" wire:click='munculkanMenuUpload' class="w-4 h-4"><svg
                                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30">
                                        <path
                                            d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z">
                                        </path>
                                    </svg></button>
                            </label>
                            <div class="">
                                @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" alt=""
                                        class="h-auto my-2 rounded w-96">
                                @endif
                            </div>
                            <div x-data="{ isUploading: false, progress: 0, finish: false }" x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="finish = true; isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <input type="file" wire:model="foto"
                                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    type="file" id="formFile" />

                                @error('foto')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror

                                {{-- Progress Bar --}}
                                <div x-show="isUploading" class="w-full my-2">
                                    <div class="bg-grayy-200 h-[2px]">
                                        <div x-bind:style="`width: ${progress}%`"
                                            class="bg-primary h-[2px] transition-all duration-300 ease-linear">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- loader --}}
                            <div wire:loading wire:target='foto'>
                                <div class="flex mt-3 gap-x-2">
                                    <div class="w-6 h-6">
                                        <x-dashboard.loader />
                                    </div>
                                    Mengupload Foto...
                                </div>
                            </div>
                            {{-- judul foto --}}
                            <div class="mt-3">
                                <label for="judul_foto"
                                    class="text-sm font-medium text-neutral-700 dark:text-neutral-200">Judul
                                    Foto</label>
                                <input type="text" wire:model="judul_foto"
                                    class="relative block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    type="text" id="judul_foto" />
                                @error('judul_foto')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- deskripsi foto --}}
                            <div class="mt-3">
                                <label for="deskripsi_foto"
                                    class="text-sm font-medium text-neutral-700 dark:text-neutral-200">Deskripsi
                                    Foto</label>
                                <textarea wire:model="deskripsi_foto"
                                    class="relative block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    type="text" id="deskripsi_foto"></textarea>
                                @error('deskripsi_foto')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="">
                                @if (isset($foto) && isset($judul_foto) && isset($deskripsi_foto))
                                    <button type="submit" class="mt-3 btn-primary">
                                        Upload Foto
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="w-full mt-6 mb-4">
        <h3 class="subheading-2 text-dark">Galeri Karangtaruna</h3>
    </div>
    {{-- list gallery item --}}
    @if (count($listFoto) > 0)
        <div class="">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-5 sm:gap-x-4 md:gap-x-2 lg:gap-x-3">
                @foreach ($listFoto as $foto)
                    <div
                        class="relative bg-white shadow-lg group @if ($foto->tampilkan_di_beranda) border-4 border-success-500 @endif">
                        <div class="">
                            {{-- image --}}
                            <div class="">
                                <div class="flex items-center justify-center w-full h-48 overflow-hidden ">
                                    <img src="{{ asset('storage/gallery/' . $foto->url_foto) }}" alt=""
                                        class="object-cover w-full h-full transition-all group-hover:scale-125">
                                </div>
                            </div>

                        </div>
                        <div class="absolute bottom-0 w-full px-4 py-4 bg-opacity-60 bg-slate-950">
                            <div class="mb-2">
                                <h3 class="text-sm font-semibold text-white">{{ $foto->judul }}</h3>
                                <p class="mb-1 text-xs text-white">{{ $foto->deskripsi }}</p>
                                <p class="text-xs text-white">{{ $foto->created_at }}</p>
                                {{ $hapusId }}
                            </div>
                            <div class="">
                                <button type="button"
                                    wire:click="priviewFoto('{{ asset('storage/gallery/' . $foto->url_foto) }}')"
                                    class="inline-block rounded bg-primary-100 px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                    data-te-toggle="modal" data-te-target="#lihatFoto" data-te-ripple-init
                                    data-te-ripple-color="light">
                                    Lihat
                                </button>
                                @can('hapus-galeri')
                                    <button type="button" wire:click="$set('hapusId', {{ $foto->id }})"
                                        data-te-toggle="modal" data-te-target="#modalKonfirmasiHapusFoto"
                                        data-te-ripple-init data-te-ripple-color="light"
                                        class="inline-block rounded bg-danger px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                                        Hapus
                                    </button>
                                @endcan
                                @can('edit-galeri')
                                    @if ($foto->tampilkan_di_beranda)
                                        <button type="button" wire:click="sembunyikanFoto('{{ $foto->id }}')"
                                            class="inline-block rounded bg-warning px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                                            Sembunyikan
                                        </button>
                                    @else
                                        <button type="button" wire:click="tampilkanFoto('{{ $foto->id }}')"
                                            class="inline-block rounded bg-success px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                                            Tampilkan
                                        </button>
                                    @endif
                                @endcan
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="w-full bg-white rounded h-96">
            <div class="flex flex-col items-center justify-center h-full">
                <img src="{{ asset('assets/illustrations/data-not-found.png') }}" alt=""
                    class="w-auto h-48">
                <h3 class="mt-4 font-semibold text-dark-primary">Data tidak ditemukan!</h3>
            </div>
        </div>
    @endif

    <div wire:ignore class="space-y-2">



        <!-- Modal -->
        <div data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="lihatFoto" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600 min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                        <!-- Modal title -->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalFullscreenLabel">
                            Lihat Foto
                        </h5>
                        <!-- Close button -->
                        <button type="button"
                            class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="relative p-4 min-[0px]:overflow-y-auto">
                        <img id="img-priview-url" src="{{ asset('storage/' . $listFoto) }}" alt=""
                            class="flex items-center justify-center object-contain w-full h-full">
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @can('hapus-galeri')
        {{-- delete confirm modal --}}
        <div data-te-modal-init wire:ignore
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="modalKonfirmasiHapusFoto" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative p-4" wire:>
                        <p>Apakah anda yakin ingin menghapus foto?
                        </p>
                    </div>
                    <!--Modal footer-->
                    <div
                        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">

                        <button type="button"
                            class="inline-block rounded bg-danger-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-danger-700 transition duration-150 ease-in-out hover:bg-danger-accent-100 focus:bg-danger-accent-100 focus:outline-none focus:ring-0 active:bg-danger-accent-200"
                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            Batal
                        </button>
                        <button type="button" wire:click="hapusFoto"
                            class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light" data-te-modal-dismiss>
                            Hapus
                        </button>

                    </div>
                </div>
            </div>
        </div>
    @endcan

    {{-- pagination --}}
    <div class="pb-10 mt-8">
        {{ $listFoto->links() }}
    </div>

    <script>
        window.addEventListener('priviewFoto', event => {
            document.getElementById('img-priview-url').src = event.detail.url;
        })
    </script>
</div>
