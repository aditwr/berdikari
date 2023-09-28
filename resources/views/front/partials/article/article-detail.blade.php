@extends('front.layouts.landing-page')

@section('content')
    {{-- Navbar --}}
    @include('front.partials.landing.navbar')
    <div class="pt-24">
        <div class="flex justify-center">
            <div class="w-full py-10 bg-white rounded 2xl:w-9/12">
                <div class="">
                    <h1 class="mb-4 font-semibold text-center heading-3">{{ $artikel->judul }}</h1>
                    <div class="flex justify-center w-full gap-x-4">
                        <span class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                            </svg>
                            {{ $artikel->penulis }}
                        </span>
                        <span class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                            </svg>
                            {{ $artikel->created_at->format('l, d M Y') }}
                        </span>
                    </div>
                </div>
                <div class="mt-8">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt=""
                        class="object-cover w-full h-[600px]">
                </div>
                <div class="2xl:flex">
                    <div class="pt-8 md:px-4 basis-8/12">
                        {{-- show tinymce content --}}
                        {!! $artikel->isi !!}

                        {{-- Comment Section --}}
                        <div class="py-8">
                            <div class="flex flex-col items-center">
                                <h5 class="font-semibold text-center heading-6">Komentar</h5>
                                <div class="w-full pt-4 md:w-8/12">
                                    <div class="mb-4">
                                        <input type="text" wire:model="judulKegiatan" id="penulis_komentar"
                                            class="block w-full transition-all rounded border-neutral-300"
                                            placeholder="Nama" required>
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" wire:model="judulKegiatan" id="penulis_komentar"
                                            class="block w-full transition-all rounded border-neutral-300"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="relative mb-4">
                                        <textarea wire:model.defer="keteranganPemasukan" class="block w-full h-32 transition-all rounded border-neutral-300"
                                            placeholder="Tulis komentar disini..."></textarea>
                                        @error('keteranganPemasukan')
                                            <span class="text-xs text-danger-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button"
                                        class="mb-2 block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Side Content --}}
                    <div class="px-4 pt-8 basis-4/12">
                        <h5 class="font-medium subheading-4">Tulisan Terbaru</h5>
                        <div class="mt-4">
                            @foreach ($artikelTerbaru as $artikelBaru)
                                {{-- item --}}
                                <a href="{{ route('landing-page.tulisan.baca', $artikelBaru->id) }}" class="">
                                    <div
                                        class="flex items-center w-full py-1 my-4 rounded-lg gap-x-2 hover:bg-slate-50 hover:cursor-pointer">
                                        <div class="flex-none w-28">
                                            <div class="flex w-full h-20 overflow-hidden rounded">
                                                <img src="{{ asset('storage/' . $artikelBaru->gambar) }}" alt=""
                                                    class="object-cover w-full h-full">
                                            </div>
                                        </div>
                                        <div class="grow">
                                            <p class="mt-2 font-medium text-dark-secondary line-clamp-3">
                                                {{ $artikelBaru->judul }}
                                            </p>
                                            <p class="mt-1 text-xs text-dark-secondary">
                                                {{ $artikelBaru->created_at->format('l, d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('front.partials.landing.footer')
@endsection
