<!-- component -->
<footer class="text-gray-600 body-font">
    <div class="container flex w-full flex-col gap-y-6 px-5 pt-24 mx-auto md:items-center lg:items-start md:flex-row">
        <div class="basis-2/4 mx-auto mt-10 md:mx-0 text-left md:mt-0">
            <a class="flex items-center justify-start font-medium text-gray-900 title-font md:justify-start">
                <span class="">
                    <img src="{{ asset('assets/logo/png/logo-no-background.png') }}" alt="" class="w-auto h-6">
                </span>
            </a>
            <p class="mt-2 text-sm text-gray-500">Organisasi Sosial Kepemudaan</p>
            <p class="mt-4 text-sm text-gray-600 lg:w-[60%]">
                Karangtaruna Berdikari adalah organisasi sosial kepemudaan karangtaruna yang berada di Dusun Suruh
                Kalong, Desa Pandeyan, Kec. Tasikmadu, Kab. Karanganyar, Jawa Tengah.
            </p>
        </div>
        <div class="basis-1/4 ">
            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">Kontak</h2>
            <nav class="mb-10 list-none flex flex-col gap-y-1">
                <li>
                    <a class="text-gray-600 flex gap-x-2 items-center text-sm font-medium hover:text-gray-800">
                        <svg class="w-4 h-4 text-primary-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        karangtarunaberdikari@gmail.com</a>
                </li>
            </nav>
        </div>
        <div class="basis-1/4">
            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">Halaman</h2>
            <nav class="mb-10 list-none flex flex-col gap-y-1">
                <li>
                    <a href="{{ route('landing-page') }}" class="text-gray-600 text-sm hover:text-gray-800">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('landing-page.kegiatan') }}"
                        class="text-gray-600 text-sm hover:text-gray-800">Kegiatan</a>
                </li>
                <li>
                    <a href="{{ route('landing-page.tulisan') }}"
                        class="text-gray-600 text-sm hover:text-gray-800">Tulisan</a>
                </li>
                <li>
                    <a href="{{ route('landing-page.galeri') }}"
                        class="text-gray-600 text-sm hover:text-gray-800">Galeri</a>
                </li>
                <li>
                    <a href="{{ route('landing-page.tentang-kami') }}"
                        class="text-gray-600 text-sm hover:text-gray-800">Tentang Kami</a>
                </li>
            </nav>
        </div>


    </div>
    <div class="bg-gray-100">
        <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto sm:flex-row">
            <p class="text-sm text-center text-gray-500 sm:text-left">© 2023 Karangtaruna Berdikari
                {{-- <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="ml-1 text-gray-600"
                    target="_blank">@karangtaruna.berdikari</a> --}}
            </p>
            <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                        </rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </div>
</footer>
