<div class="w-full">
    <div class="container mx-auto mt-[64px] px-0 sm:px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="flex flex-col">
            <div class="flex flex-col text-center gap-y-2">
                <h2 class="heading-3 text-dark-primary tracking-tight" id="kegiatan">Kegiatan Kami</h2>
                <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kegiatan terakhir yang kami
                    lakukan</p>
            </div>
        </div>

        <!-- Slider main container -->
        <div class="w-full h-auto pb-10 mt-8 swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper pb-12">
                @foreach ($listKegiatan as $kegiatan)
                    <!-- Slides -->
                    <div class="w-full px-4 swiper-slide sm:px-0 group">
                        <div class="">
                            <div
                                class="block max-w-sm bg-white rounded-lg shadow-lg dark:bg-neutral-700 overflow-hidden">
                                <div class="flex items-center justify-center w-full overflow-hidden rounded-t-lg h-44">
                                    <img class="object-cover w-full h-full "
                                        src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="" />
                                </div>
                                <div class="flex flex-col justify-between w-full h-44">
                                    <div class="px-3 pt-3">
                                        <h5
                                            class="mb-2 font-medium text-sm leading-snug subheading-6 text-slate-700 dark:text-neutral-50 line-clamp-3">
                                            {{ $kegiatan->judul_kegiatan }}
                                        </h5>
                                        <div class="flex justify-start gap-x-2 mt-1">
                                            <span class="">
                                                <svg class="w-4 h-4 text-primary-400 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path fill="currentColor"
                                                        d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                                </svg>
                                            </span>
                                            <span class=" caption text-neutral-600 dark:text-neutral-200">
                                                {{ $kegiatan->created_at->isoFormat('dddd, D MMMM Y') }}
                                            </span>
                                        </div>
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
                    </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="invisible swiper-button-prev sm:visible"></div>
            <div class="invisible swiper-button-next sm:visible"></div>
        </div>



        <div class="flex justify-center mt-4">
            <a href="{{ route('landing-page.kegiatan') }}" class="btn-secondary">Lihat
                Kegiatan Lainya</a>
        </div>
    </div>
</div>
