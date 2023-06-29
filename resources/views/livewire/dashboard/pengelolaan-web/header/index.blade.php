<div>
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Header</a>
        </x-dashboard.breadcrumb>
    </div>
    <div class="w-full 2xl:w-9/12">
        <div class="">
            <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4">
                {{-- card-container --}}
                <div class="">
                    {{-- card --}}
                    <div class="px-4 py-4 bg-white rounded">
                        <h5 class="mb-4 font-medium subheading-5">Foto 1</h5>
                        {{-- image --}}
                        <div class="mb-4">
                            @if (file_exists('storage/foto-header/foto1.jpg'))
                                <img src="{{ asset('storage/foto-header/foto1.jpg') }}" alt=""
                                    class="object-cover w-full h-48 rounded">
                            @else
                                <div class="relative flex items-center justify-center w-full h-48">
                                    <img src="{{ asset('assets/images/hero-section/hero1.jpg') }}" alt=""
                                        class="object-cover w-full h-full rounded">
                                    <div class="absolute z-10 px-2 py-1 bg-white rounded shadow bottom-2 left-2">
                                        <span class="text-sm font-medium">Foto Default</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- action --}}
                        <div class="">
                            <form wire:submit.prevent="storeFoto1">
                                <label for="formFile"
                                    class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Upload
                                    Foto untuk mengubah Foto</label>
                                <div class="">
                                    @if ($foto1)
                                        <img src="{{ $foto1->temporaryUrl() }}" alt=""
                                            class="h-auto my-2 rounded w-96">
                                    @endif
                                </div>
                                <div x-data="{ isUploading: false, progress: 0, finish: false }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="finish = true; isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="foto1"
                                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                        type="file" id="formFile" />

                                    @error('foto1')
                                        <span class="text-xs text-danger-600">{{ $message }}</span>
                                    @enderror

                                    {{-- Progress Bar --}}
                                    <div x-show="isUploading" class="my-2 w-96">
                                        <div class="bg-grayy-200 h-[2px]">
                                            <div x-bind:style="`width: ${progress}%`"
                                                class="bg-primary h-[2px] transition-all duration-300 ease-linear">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div wire:loading wire:target='foto1'>
                                    <div class="flex mt-3 gap-x-2">
                                        <div class="w-6 h-6">
                                            <x-dashboard.loader />
                                        </div>
                                        Mengupload Foto...
                                    </div>
                                </div>
                                <div class="">
                                    @isset($foto1)
                                        <button type="submit" class="mt-3 btn-primary">
                                            Ubah Foto
                                        </button>
                                    @else
                                        <button type="button" data-te-toggle="modal" data-te-target="#resetFoto1Modal"
                                            data-te-ripple-init data-te-ripple-color="light"
                                            class="mt-3 inline-block rounded bg-warning-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-warning-700 transition duration-150 ease-in-out hover:bg-warning-accent-100 focus:bg-warning-accent-100 focus:outline-none focus:ring-0 active:bg-warning-accent-200">
                                            Reset ke Default
                                        </button>
                                    @endisset
                                </div>
                            </form>

                            <!--Verically centered modal-->
                            <div data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="resetFoto1Modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                                aria-modal="true" role="dialog">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div
                                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                        <div
                                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                id="exampleModalScrollableLabel">
                                                Yakin ingin mereset foto 1 ke default?
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
                                        <div class="relative p-4">
                                            <p>Untuk mereset, foto sebelumya akan dihapus!</p>
                                        </div>

                                        <!--Modal footer-->
                                        <div
                                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                            <button type="button"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                Batal
                                            </button>
                                            <button type="button" wire:click="resetFoto('foto1')"
                                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                Reset ke Default
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- card-container --}}
                <div class="">
                    {{-- card --}}
                    <div class="px-4 py-4 bg-white rounded">
                        <h5 class="mb-4 font-medium subheading-5">Foto 2</h5>
                        {{-- image --}}
                        <div class="mb-4">
                            @if (file_exists('storage/foto-header/foto2.jpg'))
                                <img src="{{ asset('storage/foto-header/foto2.jpg') }}" alt=""
                                    class="object-cover w-full h-48 rounded">
                            @else
                                <div class="relative flex items-center justify-center w-full h-48">
                                    <img src="{{ asset('assets/images/hero-section/hero2.jpg') }}" alt=""
                                        class="object-cover w-full h-full rounded">
                                    <div class="absolute z-10 px-2 py-1 bg-white rounded shadow bottom-2 left-2">
                                        <span class="text-sm font-medium">Foto Default</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- action --}}
                        <div class="">
                            <form wire:submit.prevent="storeFoto2">
                                <label for="formFile"
                                    class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Upload
                                    Foto untuk mengubah Foto</label>
                                <div class="">
                                    @if ($foto2)
                                        <img src="{{ $foto2->temporaryUrl() }}" alt=""
                                            class="h-auto my-2 rounded w-96">
                                    @endif
                                </div>
                                <div x-data="{ isUploading: false, progress: 0, finish: false }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="finish = true; isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="foto2"
                                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                        type="file" id="formFile" />

                                    @error('foto2')
                                        <span class="text-xs text-danger-600">{{ $message }}</span>
                                    @enderror

                                    {{-- Progress Bar --}}
                                    <div x-show="isUploading" class="my-2 w-96">
                                        <div class="bg-grayy-200 h-[2px]">
                                            <div x-bind:style="`width: ${progress}%`"
                                                class="bg-primary h-[2px] transition-all duration-300 ease-linear">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div wire:loading wire:target='foto2'>
                                    <div class="flex mt-3 gap-x-2">
                                        <div class="w-6 h-6">
                                            <x-dashboard.loader />
                                        </div>
                                        Mengupload Foto...
                                    </div>
                                </div>
                                <div class="">
                                    @isset($foto2)
                                        <button type="submit" class="mt-3 btn-primary">
                                            Ubah Foto
                                        </button>
                                    @else
                                        <button type="button" data-te-toggle="modal" data-te-target="#resetFoto2Modal"
                                            data-te-ripple-init data-te-ripple-color="light"
                                            class="mt-3 inline-block rounded bg-warning-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-warning-700 transition duration-150 ease-in-out hover:bg-warning-accent-100 focus:bg-warning-accent-100 focus:outline-none focus:ring-0 active:bg-warning-accent-200">
                                            Reset ke Default
                                        </button>
                                    @endisset
                                </div>
                            </form>

                            <!--Verically centered modal-->
                            <div data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="resetFoto2Modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                                aria-modal="true" role="dialog">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div
                                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                        <div
                                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                id="exampleModalScrollableLabel">
                                                Yakin ingin mereset foto 2 ke default?
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
                                        <div class="relative p-4">
                                            <p>Untuk mereset, foto sebelumya akan dihapus!</p>
                                        </div>

                                        <!--Modal footer-->
                                        <div
                                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                            <button type="button"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                Batal
                                            </button>
                                            <button type="button" wire:click="resetFoto('foto2')"
                                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                Reset ke Default
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card-container --}}
                <div class="">
                    {{-- card --}}
                    <div class="px-4 py-4 bg-white rounded">
                        <h5 class="mb-4 font-medium subheading-5">Foto 3</h5>
                        {{-- image --}}
                        <div class="mb-4">
                            @if (file_exists('storage/foto-header/foto3.jpg'))
                                <img src="{{ asset('storage/foto-header/foto3.jpg') }}" alt=""
                                    class="object-cover w-full h-48 rounded">
                            @else
                                <div class="relative flex items-center justify-center w-full h-48">
                                    <img src="{{ asset('assets/images/hero-section/hero3.jpg') }}" alt=""
                                        class="object-cover w-full h-full rounded">
                                    <div class="absolute z-10 px-2 py-1 bg-white rounded shadow bottom-2 left-2">
                                        <span class="text-sm font-medium">Foto Default</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- action --}}
                        <div class="">
                            <form wire:submit.prevent="storeFoto3">
                                <label for="formFile"
                                    class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Upload
                                    Foto untuk mengubah Foto</label>
                                <div class="">
                                    @if ($foto2)
                                        <img src="{{ $foto2->temporaryUrl() }}" alt=""
                                            class="h-auto my-2 rounded w-96">
                                    @endif
                                </div>
                                <div x-data="{ isUploading: false, progress: 0, finish: false }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="finish = true; isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="foto2"
                                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                        type="file" id="formFile" />

                                    @error('foto2')
                                        <span class="text-xs text-danger-600">{{ $message }}</span>
                                    @enderror

                                    {{-- Progress Bar --}}
                                    <div x-show="isUploading" class="my-2 w-96">
                                        <div class="bg-grayy-200 h-[2px]">
                                            <div x-bind:style="`width: ${progress}%`"
                                                class="bg-primary h-[2px] transition-all duration-300 ease-linear">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div wire:loading wire:target='foto3'>
                                    <div class="flex mt-3 gap-x-2">
                                        <div class="w-6 h-6">
                                            <x-dashboard.loader />
                                        </div>
                                        Mengupload Foto...
                                    </div>
                                </div>
                                <div class="">
                                    @isset($foto3)
                                        <button type="submit" class="mt-3 btn-primary">
                                            Ubah Foto
                                        </button>
                                    @else
                                        <button type="button" data-te-toggle="modal" data-te-target="#resetFoto3Modal"
                                            data-te-ripple-init data-te-ripple-color="light"
                                            class="mt-3 inline-block rounded bg-warning-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-warning-700 transition duration-150 ease-in-out hover:bg-warning-accent-100 focus:bg-warning-accent-100 focus:outline-none focus:ring-0 active:bg-warning-accent-200">
                                            Reset ke Default
                                        </button>
                                    @endisset
                                </div>
                            </form>

                            <!--Verically centered modal-->
                            <div data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="resetFoto3Modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                                aria-modal="true" role="dialog">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div
                                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                        <div
                                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                id="exampleModalScrollableLabel">
                                                Yakin ingin mereset foto 3 ke default?
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
                                        <div class="relative p-4">
                                            <p>Untuk mereset, foto sebelumya akan dihapus!</p>
                                        </div>

                                        <!--Modal footer-->
                                        <div
                                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                            <button type="button"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                Batal
                                            </button>
                                            <button type="button" wire:click="resetFoto('foto3')"
                                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                Reset ke Default
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 py-4 mt-10 bg-white rounded">
            <h5 class="font-medium subheading-5">
                Kelola Tulisan Header
            </h5>
            {{-- toast --}}
            @if ($notification['status'])
                <div class="pointer-events-auto mx-auto mb-2 mt-4 hidden w-full max-w-full rounded-lg bg-success-100 bg-clip-padding text-sm text-success-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
                    id="static-example" role="alert" aria-live="assertive" aria-atomic="true"
                    data-te-autohide="false" data-te-toast-init data-te-toast-show>
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
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12" />
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
            <!--Tabs navigation-->
            <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist" data-te-nav-ref>
                <li role="presentation">
                    <a href="#tabs-home"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-home" data-te-nav-active role="tab"
                        aria-controls="tabs-home" aria-selected="true">Tulisan 1</a>
                </li>
                <li role="presentation">
                    <a href="#tabs-profile"
                        class="focus:border-transparen my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-profile" role="tab"
                        aria-controls="tabs-profile" aria-selected="false">Tulisan 2</a>
                </li>
                <li role="presentation">
                    <a href="#tabs-messages"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-messages" role="tab"
                        aria-controls="tabs-messages" aria-selected="false">Tulisan 3</a>
                </li>
            </ul>

            <!--Tabs content-->
            <div class="mb-6">
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                    <div class="relative mb-4">
                        <label for="" class="block mb-2 font-medium caption text-dark-secondary">Isi
                            Tulisan</label>
                        <textarea wire:model.defer="tulisan_header1" class="block w-full transition-all rounded h-36 border-neutral-300"></textarea>
                        @error('tulisan_header1')
                            <span class="text-xs text-danger-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-x-4">
                        <button wire:click="updateTulisanHeader('1')" class="btn btn-primary">Ubah Tulisan
                            Header</button>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                    <div class="relative mb-4">
                        <label for="" class="block mb-2 font-medium caption text-dark-secondary">Isi
                            Tulisan</label>
                        <textarea wire:model.defer="tulisan_header2" class="block w-full transition-all rounded h-36 border-neutral-300"></textarea>
                        @error('tulisan_header2')
                            <span class="text-xs text-danger-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-x-4">
                        <button wire:click="updateTulisanHeader('2')" class="btn btn-primary">Ubah Tulisan
                            Header</button>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-messages" role="tabpanel" aria-labelledby="tabs-profile-tab">
                    <div class="relative mb-4">
                        <label for="" class="block mb-2 font-medium caption text-dark-secondary">Isi
                            Tulisan</label>
                        <textarea wire:model.defer="tulisan_header3" class="block w-full transition-all rounded h-36 border-neutral-300"></textarea>
                        @error('tulisan_header3')
                            <span class="text-xs text-danger-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-x-4">
                        <button wire:click="updateTulisanHeader('3')" class="btn btn-primary">Ubah Tulisan
                            Header</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
