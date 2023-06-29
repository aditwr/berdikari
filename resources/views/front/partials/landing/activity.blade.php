<div class="w-full">
    <div class="container mx-auto mt-[64px] px-0 sm:px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="flex flex-col">
            <div class="flex flex-col text-center gap-y-2">
                <h2 class="heading-4 text-dark-primary" id="kegiatan">Kegiatan Kami</h2>
                <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kegiatan terakhir yang kami
                    lakukan</p>
            </div>
        </div>


        <!-- Slider main container -->
        <div class="w-full h-auto pb-10 mt-8 swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($listKegiatan as $kegiatan)
                    <!-- Slides -->
                    <div class="flex justify-center px-4 swiper-slide sm:px-0">
                        {{-- activity card --}}
                        <div class="w-full h-auto overflow-hidden bg-white rounded-md shadow-lg">
                            <div class="flex items-center justify-center w-full h-48 md:h-40">
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt=""
                                    class="object-cover w-full h-full">
                            </div>
                            <div class="px-4 pt-2 pb-4">
                                <h3 class="text-base font-semibold text-dark-primary">
                                    {{ $kegiatan->judul_kegiatan }}
                                </h3>
                                <span
                                    class="text-xs text-dark-secondary">{{ $kegiatan->created_at->format('l, d M Y') }}</span>

                            </div>
                            <div class="">
                                <a href="{{ route('landing-page.kegiatan.baca', $kegiatan->id) }}"
                                    class="block text-center w-full bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                    Lihat Detail
                                </a>

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
            <button class="btn-secondary">Lihat Kegiatan Lainya</button>
        </div>
    </div>
</div>
