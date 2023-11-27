<div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-carousel-slide>
    <div class="absolute right-0 bottom-0 left-0 z-[3] mx-[15%] mb-4 flex list-none justify-center p-0"
        data-te-carousel-indicators>
        {{-- pagination --}}
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="0" data-te-carousel-active
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="1"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 2"></button>
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="2"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 3"></button>
    </div>
    {{-- carousel --}}
    <div class="relative w-full h-[650px] md:h-[720px] overflow-hidden after:clear-both after:block after:content-['']">
        {{-- carousel item --}}
        <div class="relative h-full  float-left -mr-[100%] flex items-center justify-center w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
            @if (file_exists(storage_path('app/public/foto-header/foto1.jpg')))
                <img src="{{ asset('storage/foto-header/foto1.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @else
                <img src="{{ asset('assets/images/hero-section/hero1.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @endif
            {{-- slider content --}}
            <div class="absolute z-[2] flex justify-center items-center left-0 top-0 h-[640px] md:h-[720px] w-full">
                <div
                    class="px-4 text-center flex items-center flex-col gap-y-4 xl:gap-y-6 text-white sm:w-[560px] xl:w-[640px]">
                    <div class="flex items-center justify-center p-3 rounded bg-white w-16 h-16">
                        {{-- logo --}}
                        <img src="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" alt=""
                            class="object-contain w-full h-full ">
                    </div>
                    <h1
                        class="text-transparent heading-2 font-laila bg-clip-text bg-gradient-to-r leading-tight from-blue-100 to-cyan-200">
                        Karangtaruna <span
                            class="text-transparent block font-laila text-6xl bg-clip-text bg-gradient-to-r leading-snug from-blue-700 to-cyan-300">
                            "Berdikari"</span>
                    </h1>

                    <p class="mb-4 subheading-4 text-base px-5 sm:text-lg sm:px-0 text-light-secondary text-slate-300">
                        {{ $tulisan_header1 }}
                    </p>
                    <div class="flex flex-col items-center sm:flex-row sm:justify-center sm:gap-x-4 gap-y-3">
                        <a href="#kegiatan">
                            <button type="button" class="btn-primary btn-responsive">
                                Kegiatan Kami
                            </button>
                        </a>
                        <a href="#siapakami">
                            <button type="button" class="btn-secondary btn-responsive">
                                Siapa Kami?
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- overlay --}}
            <div
                class="absolute flex justify-center items-center left-0 top-0 h-full w-full bg-slate-900 opacity-60 z-[1]">
            </div>
        </div>
        <div class="relative h-full flex items-center justify-center float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item style="backface-visibility: hidden">
            @if (file_exists(storage_path('app/public/foto-header/foto2.jpg')))
                <img src="{{ asset('storage/foto-header/foto2.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @else
                <img src="{{ asset('assets/images/hero-section/hero2.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @endif
            {{-- slider content --}}
            <div class="absolute z-[2] flex justify-center items-center left-0 top-0 h-[640px] md:h-[720px] w-full">
                <div
                    class="px-4 text-center flex items-center flex-col gap-y-4 xl:gap-y-6 text-white sm:w-[560px] xl:w-[640px]">
                    <div class="flex items-center justify-center p-3 rounded bg-white w-16 h-16">
                        {{-- logo --}}
                        <img src="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" alt=""
                            class="object-contain w-full h-full ">
                    </div>
                    <h1
                        class="text-transparent heading-2 font-laila bg-clip-text bg-gradient-to-r leading-tight from-blue-100 to-cyan-200">
                        Karangtaruna <span
                            class="text-transparent block font-laila text-6xl bg-clip-text bg-gradient-to-r leading-snug from-blue-700 to-cyan-300">
                            "Berdikari"</span>
                    </h1>

                    <p class="mb-4 subheading-4 text-base px-5 sm:text-lg sm:px-0 text-light-secondary text-slate-300">
                        {{ $tulisan_header2 }}
                    </p>
                    <div class="flex flex-col items-center sm:flex-row sm:justify-center sm:gap-x-4 gap-y-3">
                        <a href="#kegiatan">
                            <button type="button" class="btn-primary btn-responsive">
                                Kegiatan Kami
                            </button>
                        </a>
                        <a href="#siapakami">
                            <button type="button" class="btn-secondary btn-responsive">
                                Siapa Kami?
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- overlay --}}
            <div
                class="absolute flex justify-center items-center left-0 top-0 h-full w-full bg-slate-900 opacity-60 z-[1]">
            </div>
        </div>
        <div class="relative h-full flex items-center justify-center float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item style="backface-visibility: hidden">
            @if (file_exists(storage_path('app/public/foto-header/foto3.jpg')))
                <img src="{{ asset('storage/foto-header/foto3.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @else
                <img src="{{ asset('assets/images/hero-section/hero3.jpg') }}" alt="hero-image"
                    class="object-cover w-full h-full">
            @endif
            {{-- slider content --}}
            <div class="absolute z-[2] flex justify-center items-center left-0 top-0 h-[640px] md:h-[720px] w-full">
                <div
                    class="px-4 text-center flex items-center flex-col gap-y-4 xl:gap-y-6 text-white sm:w-[560px] xl:w-[640px]">
                    <div class="flex items-center justify-center p-3 rounded bg-white w-16 h-16">
                        {{-- logo --}}
                        <img src="{{ asset('assets/logo/png/berdikari-favicon-color.png') }}" alt=""
                            class="object-contain w-full h-full ">
                    </div>
                    <h1
                        class="text-transparent heading-2 font-laila bg-clip-text bg-gradient-to-r tracking-tighter leading-tight from-blue-100 to-cyan-200">
                        Karangtaruna <span
                            class="text-transparent block font-laila tracking-tighter text-6xl bg-clip-text bg-gradient-to-r leading-snug from-blue-700 to-cyan-300">
                            "Berdikari"</span>
                    </h1>

                    <p class="mb-4 subheading-4 text-base px-5 sm:text-lg sm:px-0 text-light-secondary text-slate-300">
                        {{ $tulisan_header3 }}</p>
                    <div class="flex flex-col items-center sm:flex-row sm:justify-center sm:gap-x-4 gap-y-3">
                        <a href="#kegiatan">
                            <button type="button" class="btn-primary btn-responsive">
                                Kegiatan Kami
                            </button>
                        </a>
                        <a href="#siapakami">
                            <button type="button" class="btn-secondary btn-responsive">
                                Siapa Kami?
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- overlay --}}
            <div
                class="absolute flex justify-center items-center left-0 top-0 h-full w-full bg-slate-900 opacity-60 z-[1]">
            </div>
        </div>
    </div>
    <button
        class="absolute top-0 bottom-0 left-0 z-[3] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
        <span class="inline-block w-8 h-8">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#fff">
                <path
                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
    </button>
    <button
        class="absolute top-0 bottom-0 right-0 z-[3] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
        <span class="inline-block w-8 h-8">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#fff">
                <path
                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
    </button>
</div>
