<div wire:ignore>
    <div class="flex flex-col">
        <div class="flex flex-col text-center gap-y-2 px-5 sm:px-0">
            <h2 class="heading-3 text-dark-primary tracking-tight" id="kegiatan">Gallery Kami</h2>
            <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kenangan yang telah kami buat</p>
        </div>
    </div>

    @if (count($listGalleries))
        <div class="container py-2 mx-auto sm:px-5 lg:px-32 pt-4 lg:pt-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($listGalleries as $gallery)
                    <div class="w-full group ">
                        <button wire:click="priviewFoto({{ $gallery }})" data-te-toggle="modal"
                            data-te-target="#lihatFoto" data-te-ripple-init data-te-ripple-color="light" class="w-full">
                            <div class="w-full p-1 md:p-2">
                                <div class="w-full overflow-hidden h-48 rounded-lg shadow-md xl:h-64">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg group-hover:scale-125 transition-all duration-300"
                                        src="{{ asset('storage/gallery/' . $gallery->url_foto) }}" />
                                </div>
                            </div>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Modal -->
    <div data-te-modal-init wire:ignore
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="lihatFoto" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600 min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                    <!-- Modal title -->
                    <h5 class="text-base font-medium leading-normal line-clamp-1 text-neutral-800 flex gap-x-2 items-center dark:text-neutral-200"
                        id="exampleModalFullscreenLabel">
                        <span class="">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                            </svg>
                        </span>
                        <span class="hidden sm:inline">Lihat Foto : </span><span id="judul-foto"
                            class=" capitalize"></span>
                    </h5>
                    <!-- Close button -->
                    <button type="button"
                        class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="relative min-[0px]:overflow-y-auto">
                    <img id="img-priview-url" src="{{ asset('storage/gallery/' . $listGalleries[0]->url_foto) }}"
                        alt="" class="flex items-center justify-center object-contain w-full h-full">
                </div>

                <!-- Modal footer -->
                <div
                    class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-between rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                    <button type="button"
                        class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
                        data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init
                        data-te-ripple-color="light">
                        Info Foto
                    </button>

                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss>
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        <!-- Info Foto Modal -->
        <div data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="staticBackdrop" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div
                    class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl capitalize font-medium leading-normal text-slate-700 dark:text-neutral-200"
                            id="judul-foto-info">
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
                    <div data-te-modal-body-ref class="relative p-4">
                        <p id="deskripsi-foto" class="mb-2 text-dark-secondary"></p>
                        <p class="flex gap-x-2 items-center">
                            <span class="items-center">
                                <svg class="w-4 h-4 text-primary-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                </svg>
                            </span>
                            <span id="tanggal" class="text-sm text-gray-500"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        window.addEventListener('priviewFoto', event => {
            document.getElementById('img-priview-url').src = event.detail.url;
            document.getElementById('judul-foto').innerHTML = event.detail.judul;
            document.getElementById('judul-foto-info').innerHTML = event.detail.judul;
            document.getElementById('deskripsi-foto').innerHTML = event.detail.deskripsi;
            document.getElementById('tanggal').innerHTML = event.detail.tanggal;
            document.getElementById('img-priview-url').alt = event.detail.judul;
        })
    </script>
</div>
