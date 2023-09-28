<div class="pt-28">
    <div class="container mx-auto padding-responsive-in-container">
        {{-- header --}}
        <div class="flex flex-col">
            <div class="flex flex-col text-center gap-y-2">
                <h2 class="heading-4 text-dark-primary" id="kegiatan">Kegiatan Kami</h2>
                <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kegiatan terakhir yang kami
                    lakukan</p>
            </div>
        </div>

        {{-- list activity --}}
        <div class="mt-12">
            <div class="flex justify-center mb-4">
                <div class="flex justify-center">
                    <div class="items-baseline mb-3 lg:flex lg:gap-x-8">
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
            @if ($listKegiatan->count() > 0)
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-4 gap-y-8">
                    {{-- card --}}
                    @foreach ($listKegiatan as $kegiatan)
                        <div class="">
                            <div class="block max-w-sm bg-white rounded-lg shadow-xl dark:bg-neutral-700">
                                <div class="flex items-center justify-center w-full overflow-hidden rounded-t-lg h-44">
                                    <img class="object-cover w-full h-full"
                                        src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="" />
                                </div>
                                <div class="flex flex-col justify-between w-full h-44">
                                    <div class="px-3 pt-3">
                                        <h5
                                            class="mb-2 font-medium leading-tight subheading-6 text-neutral-800 dark:text-neutral-50 line-clamp-3">
                                            {{ $kegiatan->judul_kegiatan }}
                                        </h5>
                                        <p class="mb-4 caption text-neutral-600 dark:text-neutral-200">
                                            {{ $kegiatan->created_at->format('l, d F Y') }}
                                        </p>
                                    </div>
                                    <div class="px-3 pb-3">
                                        <a href="{{ route('landing-page.kegiatan.baca', $kegiatan->id) }}"
                                            type="button" class="btn-secondary" data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex items-center justify-center w-full h-80">
                    <div class="flex flex-col items-center justify-center ">
                        <img src="{{ asset('assets/illustrations/data-not-found.png') }}" alt="" class="h-44 ">
                        <h1 class="font-semibold text-gray-600 heading-5">Tidak ada kegiatan</h1>
                    </div>
                </div>
            @endif
            {{-- pagination --}}
            <div class="mt-8">
                {{ $listKegiatan->links() }}
            </div>

            {{-- <div class="flex justify-center mt-16">
                <nav aria-label="Page navigation example">
                    <ul class="flex list-style-none">
                        <li>
                            <a
                                class="pointer-events-none relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-500 transition-all duration-300 dark:text-neutral-400">Previous</a>
                        </li>
                        <li>
                            <a class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100  dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                                href="#!">1</a>
                        </li>
                        <li aria-current="page">
                            <a class="relative block rounded bg-primary-100 py-1.5 px-3 text-sm font-medium text-primary-700 transition-all duration-300"
                                href="#!">2
                                <span
                                    class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)</span>
                            </a>
                        </li>
                        <li>
                            <a class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                                href="#!">3</a>
                        </li>
                        <li>
                            <a class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                                href="#!">Next</a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
        </div>
    </div>
</div>
