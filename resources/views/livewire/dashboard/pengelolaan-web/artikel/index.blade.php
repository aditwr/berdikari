<div>
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Artikel</a>
        </x-dashboard.breadcrumb>
    </div>
    <div class="my-2">
        <a href="{{ route('dashboard.pengelolaan-web.artikel.tambah') }}" class="btn-primary">
            Buat Artikel
        </a>
    </div>
    <div class="mt-8">
        <div class="flex flex-col items-baseline justify-between mb-8 lg:flex-row lg:items-end gap-x-8 gap-y-4">
            <div class="flex flex-col md:flex-row gap-y-4 gap-x-8">
                <div class="flex gap-x-8">
                    {{-- select bulan --}}
                    <div class="">
                        <h3 class="mb-2 font-medium caption">Pilih Bulan</h3>
                        <div class="">
                            <select wire:model='bulan' class="rounded">
                                <option value="">Semua</option>
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
                        <h3 class="mb-2 font-medium caption">Pilih Tahun</h3>
                        <div class="">
                            <select wire:model='tahun' class="rounded ">
                                {{-- buat list option tahun sekarang dan 10 tahun kebelakang --}}
                                <option value="">Semua</option>
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    {{-- select bulan --}}
                    <div class="">
                        <h3 class="mb-2 font-medium caption">Kategori</h3>
                        <div class="">
                            <select wire:model='kategori' class="rounded">
                                <option value="">Semua</option>
                                @foreach ($listKategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-96">
                <div class="relative flex flex-wrap items-stretch w-full bg-white">
                    <input type="search" wire:model="search"
                        class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        placeholder="Cari" aria-label="Search" aria-describedby="button-addon1" />

                    <!--Search button-->
                    <button
                        class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                        type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- List Item --}}
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

            {{-- toast --}}
            @if (session()->has('success'))
                <div class="pointer-events-auto mx-auto mb-4 hidden w-full max-w-full rounded-lg bg-success-100 bg-clip-padding text-sm text-success-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
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
                            {{ session('success')['title'] }}
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
                        {!! session('success')['message'] !!}
                    </div>
                </div>
            @endif
        </div>
        @if ($listArtikel->count() > 0)
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-5 sm:gap-x-4 md:gap-x-2 lg:gap-x-3">
                @foreach ($listArtikel as $artikel)
                    <div class="">
                        <div class="bg-white rounded shadow-lg ">
                            {{-- image --}}
                            <div class="mb-2">
                                <div class="flex items-center justify-center w-full h-48 overflow-hidden rounded">
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt=""
                                        class="object-cover w-full h-full">
                                </div>
                            </div>
                            {{-- title --}}
                            <div class="px-4 py-2">
                                <h3 class="font-semibold subheading-6 text-dark-primary">
                                    {{ $artikel->judul }}
                                </h3>
                                {{-- tanggal dibuat --}}
                                <p class="text-sm text-dark-secondary">{{ $artikel->created_at->format('l, d M Y') }}
                                </p>
                            </div>
                            {{-- button --}}
                            <div class="flex justify-between px-4 pt-2 pb-4">
                                <a href="{{ route('dashboard.pengelolaan-web.artikel.baca', $artikel->id) }}"
                                    class="btn-primary">Lihat Detail</a>
                                <div class="flex gap-x-2">
                                    <a href="{{ route('dashboard.pengelolaan-web.artikel.edit', $artikel->id) }}"
                                        class="text-warning-700 bg-warning-200 btn-secondary-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="24" height="24" class="p-1 rounded-full bg-warning-300"
                                            viewBox="0,0,256,256" style="fill:#000000;">
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
                                    </a>
                                    <button type="button" wire:click="$set('deleteId', {{ $artikel->id }})"
                                        class="bg-danger-200 btn-secondary-small" data-te-toggle="modal"
                                        data-te-target="#modalDeleteartikel{{ $artikel->id }}" data-te-ripple-init
                                        data-te-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="24" height="24" class="p-1 rounded-full bg-danger-300"
                                            viewBox="0,0,256,256" style="fill:#000000;">
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
                                    {{-- delete confirm modal --}}
                                    <div data-te-modal-init wire:ignore
                                        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                        id="modalDeleteartikel{{ $artikel->id }}" tabindex="-1"
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
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <!--Modal body-->
                                                <div class="relative p-4" wire:>
                                                    <p>Apakah anda yakin ingin menghapus artikel "<span
                                                            class="font-medium">{{ $artikel->judul }}</span>"?
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

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
        <div class="pb-10 mt-8">
            {{ $listArtikel->links() }}
        </div>
    </div>
</div>
