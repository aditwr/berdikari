<div>
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Galeri</a>
        </x-dashboard.breadcrumb>
    </div>
    <div class="my-2">
        @if ($tampilkanTombolUpload)
        <button wire:click="munculkanMenuUpload" class="btn-primary">
            Upload Foto
        </button>
        @endif
    </div>
    <div class="mt-4">
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
                                <button type="button" wire:click='munculkanMenuUpload' class="w-4 h-4"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30">
                                    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"></path>
                                </svg></button></label>
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
                            <div class="">
                                @isset($foto)
                                    <button type="submit" class="mt-3 btn-primary">
                                        Upload Foto
                                    </button>
                                @endisset
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
    @if(count($daftarFoto) > 0)
    <div class="">
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-5 sm:gap-x-4 md:gap-x-2 lg:gap-x-3">
            @foreach ($daftarFoto as $urlFoto)
                <div class="relative group">
                    <div class="bg-white rounded shadow-lg ">
                        {{-- image --}}
                        <div class="mb-2">
                            <div class="flex items-center justify-center w-full h-48 overflow-hidden rounded">
                                <img src="{{ asset('storage/'. $urlFoto) }}" alt=""
                                    class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="absolute justify-between hidden w-full px-4 bottom-4 group-hover:flex">
                        <button
                            type="button" wire:click="priviewFoto('{{ asset('storage/'. $urlFoto) }}')"
                            class="btn-secondary"
                            data-te-toggle="modal"
                            data-te-target="#exampleModalCenter"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Lihat
                        </button>
                        <button class="btn-secondary bg-danger-50 text-danger-800">
                            Hapus
                        </button>
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

      <!--Verically centered modal-->
      <div
        data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="exampleModalCenter"
        tabindex="-1"
        aria-labelledby="exampleModalCenterTitle"
        aria-modal="true"
        role="dialog">
        <div
          data-te-modal-dialog-ref
          class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
          <div
            class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
            <div
              class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
              <!--Modal title-->
              <h5
                class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                id="exampleModalCenterTitle">
                Modal title
              </h5>
              <!--Close button-->
              <button
                type="button"
                class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-te-modal-dismiss
                aria-label="Close">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!--Modal body-->
            <div class="relative p-4">
              <div class="w-full h-96">
                <img id="img-priview-url" src="{{ asset('storage/'. $daftarFoto[0]) }}" alt="" class="flex items-center justify-center object-cover w-full h-full">
              </div>
            </div>

            <!--Modal footer-->
            <div
              class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
              <button
                type="button"
                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                data-te-modal-dismiss
                data-te-ripple-init
                data-te-ripple-color="light">
                Close
              </button>
              <button
                type="button"
                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>

    <div class="pb-10 mt-8">
        {{-- {{ $listKegiatan->links() }} --}}
    </div>
    </div>

    <script>
        window.addEventListener('priviewFoto', event => {
            document.getElementById('img-priview-url').src = event.detail.url;
        })
    </script>
</div>


