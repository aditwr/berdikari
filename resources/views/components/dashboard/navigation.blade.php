<body class="dark:bg-zinc-800">
    <!--Main Navigation-->
    <header>
        <!-- Sidenav -->
        <nav id="sidenav-1"
            class="fixed flex flex-col justify-between left-0 top-0 z-[1035]  h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] dark:bg-zinc-800 xl:data-[te-sidenav-hidden='false']:translate-x-0"
            data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode-breakpoint-over="0"
            data-te-sidenav-mode-breakpoint-side="xl" data-te-sidenav-content="#content" data-te-sidenav-accordion="true">
            <div class="">
                <a class="flex items-center justify-center py-6 mb-3 outline-none" href="#!" data-te-ripple-init
                    data-te-ripple-color="primary">
                    <img id="te-logo" class="w-10 mr-2"
                        src="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" alt="TE Logo"
                        draggable="false" />
                </a>
                <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.index')) text-primary-600 font-medium @endif"
                            href="{{ route('dashboard.index') }}" data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.index'))
                                    <svg class="w-4 h-4 text-primary-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                                    </svg>
                                @endif
                            </span>
                            <span>Beranda</span></a>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.keuangan.*'))
                                    <svg class="w-4 h-4 text-primary-600 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path
                                            d="M18 0H6a2 2 0 0 0-2 2h10a4 4 0 0 1 4 4v6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                                        <path
                                            d="M14 16H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z" />
                                        <path d="M8 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-4a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                    </svg>
                                @endif
                            </span>
                            <span>Keuangan</span>
                            <span
                                class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 dark:[&>svg]:fill-gray-300"
                                data-te-sidenav-rotate-icon-ref>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </span>
                        </a>
                        <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                            data-te-sidenav-collapse-ref>
                            <li class="relative">
                                <a href="{{ route('dashboard.keuangan.laporan') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.keuangan.laporan')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Laporan Keuangan</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.keuangan.pemasukan') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.keuangan.pemasukan')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Pemasukan</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.keuangan.pengeluaran') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.keuangan.pengeluaran')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Pengeluaran</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.keuangan.kelola') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.keuangan.kelola')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Kelola Keuangan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.catatan.*'))
                                    <svg class="w-4 h-4 text-primary-600 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path
                                            d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                                    </svg>
                                @endif
                            </span>
                            <span>Catatan</span>
                            <span
                                class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 dark:[&>svg]:fill-gray-300"
                                data-te-sidenav-rotate-icon-ref>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </span>
                        </a>
                        <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                            data-te-sidenav-collapse-ref>
                            <li class="relative">
                                <a href="{{ route('dashboard.catatan.jenis') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.catatan.jenis')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Jenis Catatan</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.catatan.index') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.catatan.index')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Catatan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.inventaris.*'))
                                    <svg class="w-4 h-4 text-primary-600 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path
                                            d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                                    </svg>
                                @endif
                            </span>
                            <span>Inventaris</span>
                            <span
                                class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 dark:[&>svg]:fill-gray-300"
                                data-te-sidenav-rotate-icon-ref>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </span>
                        </a>
                        <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                            data-te-sidenav-collapse-ref>
                            <li class="relative">
                                <a href="{{ route('dashboard.inventaris.index') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.inventaris.index')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Inventaris</a>
                            </li>
                        </ul>
                    </li>

                    {{-- artikel link --}}
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.artikel.index')) text-primary-600 font-medium @elseif(request()->routeIs('dashboard.artikel.tambah')) @elseif(request()->routeIs('dashboard.artikel.edit')) text-primary-600 font-medium text-primary-600 font-medium @elseif(request()->routeIs('dashboard.artikel.baca')) text-primary-600 font-medium @endif"
                            href="{{ route('dashboard.artikel.index') }}" data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.artikel.*'))
                                    <svg class="w-4 h-4 text-primary-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path
                                            d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                        <path
                                            d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z" />
                                    </svg>
                                @endif
                            </span>
                            <span>Artikel</span></a>
                    </li>

                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            data-te-sidenav-link-ref>
                            <span class="pr-4">
                                @if (request()->routeIs('dashboard.pengelolaan-web.*'))
                                    <svg class="w-4 h-4 text-primary-600 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path
                                            d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                                    </svg>
                                @endif
                            </span>
                            <span>Pengelolaan Web</span>
                            <span
                                class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 dark:[&>svg]:fill-gray-300"
                                data-te-sidenav-rotate-icon-ref>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </span>
                        </a>
                        <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                            data-te-sidenav-collapse-ref>
                            @can('edit-header')
                                <li class="relative">
                                    <a href="{{ route('dashboard.pengelolaan-web.header.index') }}"
                                        class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.pengelolaan-web.header.index')) text-primary-600 font-medium @endif"
                                        data-te-sidenav-link-ref>Header</a>
                                </li>
                            @endcan
                            <li class="relative">
                                <a href="{{ route('dashboard.pengelolaan-web.kegiatan.index') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.pengelolaan-web.kegiatan.index')) text-primary-600 font-medium @elseif(request()->routeIs('dashboard.pengelolaan-web.kegiatan.tambah')) @elseif(request()->routeIs('dashboard.pengelolaan-web.kegiatan.edit')) text-primary-600 font-medium text-primary-600 font-medium @elseif(request()->routeIs('dashboard.pengelolaan-web.kegiatan.baca')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Kegiatan</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.pengelolaan-web.gallery.index') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                    data-te-sidenav-link-ref>Galeri</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('dashboard.pengelolaan-web.izin-akses.index') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10 @if (request()->routeIs('dashboard.pengelolaan-web.izin-akses.index')) text-primary-600 font-medium @endif"
                                    data-te-sidenav-link-ref>Kelola Izin Akses</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="pl-3 pb-3">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="group flex rounded-xl h-12 cursor-pointer items-center truncate px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        href="#!" data-te-sidenav-link-ref>
                        <svg class="w-4 h-4 mr-4 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                        </svg>
                        <span class="font-medium text-grey-400">Logout</span></button>
                </form>
            </div>
        </nav>
        <!-- Sidenav -->

        <!-- Navbar -->
        <nav id="main-navbar"
            class="fixed z-[99999] left-0 right-0 top-0 flex w-full flex-nowrap items-center justify-between bg-white py-[0.6rem] text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700 dark:bg-zinc-700 lg:flex-wrap lg:justify-start xl:pl-60 xl:hidden"
            data-te-navbar-ref>
            <!-- Container wrapper -->
            <div class="flex items-center justify-between w-full px-4 py-3">
                <!-- Toggler -->
                <button data-te-sidenav-toggle-ref data-te-target="#sidenav-1"
                    class="block border-0 bg-transparent px-2.5 text-gray-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 xl:hidden"
                    aria-controls="#sidenav-1" aria-haspopup="true">
                    <span class="">
                        <svg class="w-5 h-5 text-primary-700 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 1h14M1 6h14M1 11h7" />
                        </svg>
                    </span>
                </button>

                {{-- Page Title  --}}
                <div class="flex-grow">
                    <p class="font-medium line-clamp-1 text-center text-primary-700">
                        @yield('title')
                    </p>
                </div>

                <!-- Right links -->
                <div class="w-16 h-auto">
                    <div class="relative flex w-full justify-end items-center">
                        <!-- Notification dropdown -->
                        {{-- <li class="relative" data-te-dropdown-ref>
                        <a class="flex items-center mr-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                            href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                            aria-expanded="false">
                            <span class="dark:text-gray-200 [&>svg]:w-3.5">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                                    </path>
                                </svg>
                            </span>
                            <span
                                class="absolute -mt-2.5 ml-2 rounded-full bg-red-600 px-1.5 py-[1px] text-[0.6rem] text-white">1</span>
                        </a>
                        <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                            aria-labelledby="navbarDropdownMenuLink" data-te-dropdown-menu-ref>
                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>Some news</a>
                            </li>
                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>Another news</a>
                            </li>
                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>Something else here</a>
                            </li>
                        </ul>
                    </li> --}}

                        <!-- Icon -->
                        {{-- <li class="mr-4">
                        <a href="#">
                            <span
                                class="fill-gray-500 hover:fill-gray-700 focus:fill-gray-700 dark:fill-gray-200 [&>svg]:w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M41.4 9.4C53.9-3.1 74.1-3.1 86.6 9.4L168 90.7l53.1-53.1c28.1-28.1 73.7-28.1 101.8 0L474.3 189.1c28.1 28.1 28.1 73.7 0 101.8L283.9 481.4c-37.5 37.5-98.3 37.5-135.8 0L30.6 363.9c-37.5-37.5-37.5-98.3 0-135.8L122.7 136 41.4 54.6c-12.5-12.5-12.5-32.8 0-45.3zm176 221.3L168 181.3 75.9 273.4c-4.2 4.2-7 9.3-8.4 14.6H386.7l42.3-42.3c3.1-3.1 3.1-8.2 0-11.3L277.7 82.9c-3.1-3.1-8.2-3.1-11.3 0L213.3 136l49.4 49.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0zM512 512c-35.3 0-64-28.7-64-64c0-25.2 32.6-79.6 51.2-108.7c6-9.4 19.5-9.4 25.5 0C543.4 368.4 576 422.8 576 448c0 35.3-28.7 64-64 64z" />
                                </svg>
                            </span>
                        </a>
                    </li> --}}
                        <!-- Icon -->

                        <!-- Notification dropdown -->
                        <div class="relative" data-te-dropdown-ref>
                            <a class="flex w-full h-full items-center mr-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                                href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                                aria-expanded="false">
                                <span class="dark:text-gray-200 [&>svg]:w-3.5">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                                        </path>
                                    </svg>
                                </span>
                                {{-- item count --}}
                                {{-- <span
                                    class="absolute -mt-2.5 ml-2 rounded-full bg-red-600 px-1.5 py-[1px] text-[0.6rem] text-white">1</span> --}}
                            </a>
                            <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="navbarDropdownMenuLink" data-te-dropdown-menu-ref>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Some news</a>
                                </li>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Another news</a>
                                </li>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Something else here</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Avatar -->
                        <div class="relative" data-te-dropdown-ref>
                            <a class="flex items-center transition duration-150 ease-in-out hidden-arrow whitespace-nowrap motion-reduce:transition-none"
                                href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                                aria-expanded="false">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                                    class="rounded-full w-6 h-6" alt="Avatar" loading="lazy" />
                            </a>
                            <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                                <li>
                                    <a class="block w-full font-medium line-clamp-1 px-4 py-2 text-sm text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref> {{ auth()->user()->name }}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class=" flex justify-center w-full py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                            data-te-dropdown-item-ref><span class="">
                                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 18 15">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                                                </svg>
                                            </span>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

        {{-- Navbar for Xl and Larger --}}
        <nav class="hidden xl:flex items-center w-full h-20  xl:pl-[264px] 2xl:pl-72 ">
            <div class="w-full flex items-center dashboard-padding-responsive">
                <div class="flex-grow">
                    <h1 class="heading-6 line-clamp-1 text-primary-600 tracking-tight font-medium">
                        @yield('title')
                    </h1>
                </div>
                <div class="w-auto h-12">
                    <div class="w-full h-full flex items-center px-4 gap-x-2 bg-white rounded-lg shadow-lg">
                        <!-- Notification dropdown -->
                        <div class="relative" data-te-dropdown-ref>
                            <a class="flex w-full h-full items-center mr-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                                href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                                aria-expanded="false">
                                <span class="dark:text-gray-200 [&>svg]:w-3.5">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                                        </path>
                                    </svg>
                                </span>
                                {{-- item count --}}
                                {{-- <span
                                    class="absolute -mt-2.5 ml-2 rounded-full bg-red-600 px-1.5 py-[1px] text-[0.6rem] text-white">1</span> --}}
                            </a>
                            <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="navbarDropdownMenuLink" data-te-dropdown-menu-ref>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Some news</a>
                                </li>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Another news</a>
                                </li>
                                <li>
                                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref>Something else here</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Avatar -->
                        <div class="relative" data-te-dropdown-ref>
                            <a class="flex gap-x-2 items-center transition duration-150 ease-in-out hidden-arrow whitespace-nowrap motion-reduce:transition-none"
                                href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                                aria-expanded="false">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                                    class="rounded-full w-6 h-6" alt="Avatar" loading="lazy" />
                                <span class="font-medium text-sm">
                                    {{ auth()->user()->name }}
                                </span>
                            </a>
                            <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                                <li>
                                    <a class="block w-full font-medium line-clamp-1 px-4 py-2 text-sm text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                        href="#" data-te-dropdown-item-ref> {{ auth()->user()->name }}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class=" flex justify-center w-full py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                            data-te-dropdown-item-ref><span class="">
                                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 18 15">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                                                </svg>
                                            </span>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="">
        <div class="container"></div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer></footer>
    <!--Footer-->
</body>
