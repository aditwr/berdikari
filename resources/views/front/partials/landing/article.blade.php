<!-- Container for demo purpose -->
<div class="container mx-auto my-24 lg:my-32 padding-responsive-in-container">

    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800">

        <div class="flex flex-col">
            <div class="flex flex-col text-center gap-y-2 px-5 sm:px-0">
                <h2 class="heading-3 tracking-tight text-dark-primary" id="artikel">Tulisan Kami</h2>
                <p class="subheading-5 text-dark-secondary">Berikut adalah beberapa kenangan yang telah kami buat</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3 mt-4 lg:mt-8">
            @foreach ($listArtikel as $artikel)
                <div class="relative overflow-hidden bg-no-repeat bg-cover rounded-lg shadow-lg"
                    style="background-position: 50%;" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <a href="{{ route('landing-page.tulisan.baca', $artikel->id) }}" class="">
                        <div class="flex items-center justify-center w-full h-64">
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="object-cover w-full h-full" />
                        </div>
                        <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden bg-fixed"
                            style="background-color: rgba(0, 0, 0, 0.4)">
                            <div class="flex items-end justify-start h-full">
                                <div class="m-6 text-white">
                                    <h5 class="mb-3 text-lg font-bold line-clamp-3">{{ $artikel->judul }}</h5>
                                    <p class="text-sm text-slate-100">
                                        di publish pada
                                        <u>{{ $artikel->created_at->isoFormat('D MMMM Y') }}</u>
                                        oleh
                                        <span class="font-medium">{{ $artikel->penulis }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8">
            <button class="btn-secondary">Lihat Tulisan Lainya</button>
        </div>

    </section>
    <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
