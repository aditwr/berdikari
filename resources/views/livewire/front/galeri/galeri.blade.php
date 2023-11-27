<div class="pt-28">
    <div class="container mx-auto padding-responsive-in-container">
        {{-- header --}}
        <div class="flex flex-col">
            <div class="flex flex-col text-center gap-y-2">
                <h2 class="heading-3 tracking-tight text-dark-primary" id="kegiatan">Galeri Kami</h2>
                <p class="subheading-5 text-dark-secondary">Berikut adalah galeri kenangan kami</p>
            </div>
        </div>

        {{-- list activity --}}
        <div class="mt-12">
            <div class="flex justify-center mb-4">
                <div class="flex justify-center">
                    <div class="items-baseline mb-3 flex flex-col lg:flex-row gap-y-3 lg:gap-x-8">
                        <div class="flex flex-col md:flex-row gap-y-4 gap-x-4">
                            <div class="flex gap-x-4">
                                {{-- select bulan --}}
                                <div class="">
                                    <div class="">
                                        <select wire:model='bulan' class="rounded">
                                            <option value="">Pilih Bulan</option>
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
                                    <div class="">
                                        <select wire:model='tahun' class="rounded ">
                                            {{-- buat list option tahun sekarang dan 10 tahun kebelakang --}}
                                            <option value="">Pilih Tahun</option>
                                            @for ($i = 0; $i < 10; $i++)
                                                <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- search --}}
                        <div class="relative flex flex-wrap items-stretch w-full mb-4 lg:w-96">
                            <input type="search" wire:model='search'
                                class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />
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
            @if ($listGalleries->count() > 0)
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-8">
                    {{-- card --}}
                    @foreach ($listGalleries as $gallery)
                        <button class="" wire:click="priviewFoto({{ $gallery }})" data-te-toggle="modal"
                            data-te-target="#lihatFoto" data-te-ripple-init data-te-ripple-color="light">
                            <div
                                class="w-full h-64 rounded-lg overflow-hidden relative group hover:border border-neutral-300">
                                <img src="{{ asset('storage/gallery/' . $gallery->url_foto) }}" alt=""
                                    class="w-full h-full object-cover group-hover:scale-125 transition-all duration-300">
                                {{-- overlay --}}
                                <div
                                    class="absolute -bottom-20 group-hover:bottom-0 transition-all duration-300 left-0 w-full h-20 bg-white">
                                    <div class="h-full px-4 py-2">
                                        <h1
                                            class="text-dark-primary font-semibold text-base mb-1 line-clamp-1 capitalize">
                                            {{ $gallery->judul }}</h1>
                                        {{-- created_at date format --}}
                                        <p class="text-dark-secondary text-xs">
                                            {{ date('d F Y', strtotime($gallery->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>
            @else
                <div class="flex items-center justify-center w-full h-80">
                    <div class="flex flex-col items-center justify-center ">
                        <img src="{{ asset('assets/illustrations/data-not-found.png') }}" alt="" class="h-44 ">
                        <h1 class="font-semibold text-gray-600 heading-5">Hasil tidak ada!</h1>
                    </div>
                </div>
            @endif

            {{-- modal lihat foto --}}
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="relative min-[0px]:overflow-y-auto">
                            <img id="img-priview-url" src="" alt=""
                                class="flex items-center justify-center object-contain w-full h-full">
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
                    id="staticBackdrop" data-te-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12" />
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

            {{-- pagination --}}
            <div class="mt-8">
                {{ $listGalleries->links() }}
            </div>
        </div>
    </div>
</div>
@push('script_front_body')
    <script>
        window.addEventListener('priviewFoto', event => {
            document.getElementById('img-priview-url').src = event.detail.url;
            document.getElementById('judul-foto').innerHTML = event.detail.judul;
            document.getElementById('judul-foto-info').innerHTML = event.detail.judul;
            document.getElementById('deskripsi-foto').innerHTML = event.detail.deskripsi;
            document.getElementById('tanggal').innerHTML = event.detail.tanggal;
        })
    </script>
@endpush
