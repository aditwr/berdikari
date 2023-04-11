<header class="fixed z-50 w-full bg-white shadow-lg">
    <nav class="w-full h-16" x-data="{ hamburgerActive: false }" @click.outside="hamburgerActive = false">
        <div class="relative flex justify-between h-full padding-responsive">
            <div class="h-full">
                {{-- logo --}}
                <div class="flex items-center justify-center h-full">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="logo"
                        class="object-center w-auto h-6 lg:h-8">
                </div>
            </div>
            <div class="hidden bg-white lg:py-0 lg:px-0 lg:static lg:flex">
                <div class="h-full">
                    {{-- nav links --}}
                    <ul class="lg:h-full flex flex-col lg:flex-row lg:gap-x-10 lg:w-[560px] lg:justify-center">
                        <li class="h-10 lg:h-full">
                            <a href="{{ route('landing-page') }}"
                                class="flex items-center h-full @if (Route::is('landing-page')) text-primary-700 border-primary-700 lg:border-b-2 @endif ">
                                Beranda
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="{{ route('landing-page.kegiatan') }}"
                                class="flex items-center h-full @if (Route::is('landing-page.kegiatan')) text-primary-700 border-primary-700 lg:border-b-2 @endif">
                                Kegiatan
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="{{ route('landing-page.tulisan') }}"
                                class="flex items-center h-full @if (Route::is('landing-page.tulisan')) text-primary-700 border-primary-700 lg:border-b-2 @endif">
                                Tulisan
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="{{ route('landing-page.tentang-kami') }}"
                                class="flex items-center h-full @if (Route::is('landing-page.tentang-kami')) text-primary-700 border-primary-700 lg:border-b-2 @endif">
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pt-4 pb-2 lg:py-0 lg:h-full">
                    {{-- auth links --}}
                    <div class="flex items-center h-full gap-x-3">
                        @auth
                            <a href="{{ route('dashboard.index') }}" class="">
                                <button type="button"
                                    class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                    Dashboard
                                </button>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="">
                                <button type="button"
                                    class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                    Masuk
                                </button>
                            </a>
                            <a href="{{ route('register') }}" class="">
                                <button type="button"
                                    class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                                    Daftar
                                </button>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- Mobile Navigation --}}
            <div x-show="hamburgerActive" x-transition.scale.origin.top
                class="absolute left-0 right-0 px-4 py-4 bg-slate-50 top-16 lg:py-0 lg:px-0 lg:static lg:flex">
                <div class="h-full">
                    {{-- nav links --}}
                    <ul class="lg:h-full flex flex-col lg:flex-row lg:gap-x-10 lg:w-[560px] lg:justify-center">
                        <li class="h-10 lg:h-full">
                            <a href=""
                                class="flex items-center h-full text-primary-700 border-primary-700 lg:border-b-2">
                                Beranda
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="" class="flex items-center h-full">
                                Kegiatan
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="" class="flex items-center h-full">
                                Tulisan
                            </a>
                        </li>
                        <li class="h-10 lg:h-full">
                            <a href="" class="flex items-center h-full">
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pt-4 pb-2 lg:py-0 lg:h-full">
                    {{-- auth links --}}
                    <div class="flex items-center h-full gap-x-3">
                        <button type="button"
                            class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                            Masuk
                        </button>
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
            {{-- mobile humburger --}}
            <div class="lg:hidden">
                <button x-on:click="hamburgerActive = !hamburgerActive"
                    class="flex items-center justify-center w-10 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
