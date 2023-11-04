<div>
    <div class="flex flex-col">
        <div class="flex flex-col text-center gap-y-2">
            <h2 class="heading-4 text-dark-primary" id="kegiatan">Gallery Kami</h2>
            <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kenangan yang telah kami buat</p>
        </div>
    </div>


    @if(count($listGallery) > 0)
        <div class="container py-2 mx-auto sm:px-5 lg:px-32 lg:pt-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($listGallery as $gallery)
                <div class="w-full">
                    <button wire:click="priviewFoto({{ $gallery }})" data-te-toggle="modal" data-te-target="#lihatFoto"
                        data-te-ripple-init data-te-ripple-color="light" class="w-full">
                        <div class="w-full p-1 md:p-2">
                            <div class="w-full h-48 rounded-lg shadow-md xl:h-64">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="{{ asset('storage/gallery/' . $gallery->url_foto) }}" />
                            </div>
                        </div>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(count($listGallery) > 0)
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
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalFullscreenLabel">
                            Lihat Foto : <span id="judul-foto"></span>
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
                    <div class="relative py-2 min-[0px]:overflow-y-auto">
                        <img id="img-priview-url" src="{{ asset('storage/gallery/' . $listGallery[0]->url_foto) }}" alt=""
                            class="flex items-center justify-center object-contain w-full h-[92%]">
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
                id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                    <div
                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                        <div
                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                            <!--Modal title-->
                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                id="judul-foto-info">
                                Judul
                            </h5>
                            <!--Close button-->
                            <button type="button"
                                class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!--Modal body-->
                        <div data-te-modal-body-ref class="relative p-4">
                            <p id="deskripsi-foto" class=""></p>
                            <p id="tanggal" class="text-sm text-gray-500"></p>
                        </div>

                        <!--Modal footer-->
                        <div
                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                            <button type="button"
                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif

    @if(count($listGallery) > 0)
        <div class="flex justify-center">
            {{ $listGallery->links() }}
        </div>
    @endif
    <script>
        window.addEventListener('priviewFoto', event => {
            document.getElementById('img-priview-url').src = event.detail.url;
            document.getElementById('judul-foto').innerHTML = event.detail.judul;
            document.getElementById('judul-foto-info').innerHTML = event.detail.judul;
            document.getElementById('deskripsi-foto').innerHTML = event.detail.deskripsi;
            document.getElementById('tanggal').innerHTML = event.detail.tanggal;
        })
    </script>
</div>