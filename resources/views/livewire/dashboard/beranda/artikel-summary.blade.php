<div class="bg-white rounded-lg h-full shadow py-4 px-4 md:pt-6 md:px-8">

    {{-- container --}}
    <div class="w-full flex gap-x-4">
        <div class="md:basis-3/12 w-full">
            <h class="subheading-5 font-medium ">Artikel</h>
            <p class="subheading-6 font-medium">Artikel bulan ini</p>
            <div class="bg-success-100 rounded-lg mt-3">
                <div class=" px-4 py-4">
                    <p class="heading-3 text-success-700 text-center">{{ $jumlah_artikel_bulan_ini }}</p>
                    <p class="subheading-5 text-center font-medium mb-2">Catatan <br>Baru</p>
                </div>
            </div>
        </div>
        <div class="md:basis-9/12 ">
            <div class="flex flex-col  w-full h-full">
                <div class="overflow-x-auto w-full h-full">
                    <div class="w-full h-full">
                        <div class="overflow-hidden h-full">
                            @if ($artikel_bulan_ini->count() > 0)
                                <table class="w-full text-left text-sm font-light overflow-x-scroll overflow-y-scroll">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-2">No</th>
                                            <th scope="col" class="px-6 py-2">Judul Artikel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel_bulan_ini as $artikel)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="px-6 py-2 font-medium">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-2 flex gap-x-4 w-full justify-between">
                                                    <div class="">
                                                        <p class="line-clamp-1">{{ $artikel->judul }}</p>
                                                    </div>
                                                    <div class="">
                                                        <a href="{{ route('dashboard.pengelolaan-web.artikel.baca', $artikel->id) }}"
                                                            class="">
                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 15">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="mt-2">
                                    {{ $artikel_bulan_ini->links() }}
                                </div>
                            @else
                                <div class="h-full flex items-center w-full">
                                    <p class="text-center w-full">Tidak ada artikel</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
