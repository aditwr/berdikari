@extends('dashboard.layouts.dashboard')

@section('title')
    Baca Catatan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="w-full 2xl:w-9/12">
            <div class="">
                <x-dashboard.breadcrumb>
                    <a href="#" class="text-gray-500 hover:text-primary-700">Catatan</a>
                    <span class="mx-2">/</span>
                    <a href="#" class="text-dark-primary hover:text-primary-700">Baca Catatan</a>
                </x-dashboard.breadcrumb>
            </div>
            <div class="">
                {{-- toast --}}
                @if (session()->has('success'))
                    <div class="pointer-events-auto mx-auto mb-4 hidden w-full max-w-full rounded-lg bg-success-100 bg-clip-padding text-sm text-success-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
                        id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-te-autohide="false"
                        data-te-toast-init data-te-toast-show>
                        <div
                            class="flex items-center justify-between rounded-t-lg border-b-2 border-success/20 bg-success-100 bg-clip-padding px-4 pb-2 pt-2.5">
                            <p class="flex items-center font-bold text-success-700">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                                    class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                    </path>
                                </svg>
                                {!! session('success')['title'] !!}
                            </p>
                            <div class="flex items-center">
                                <button type="button" data-te-toast-dismiss
                                    class="box-content ml-2 border-none rounded-none opacity-80 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    aria-label="Close">
                                    <span
                                        class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="px-4 py-4 break-words rounded-b-lg bg-success-100 text-success-700">
                            {!! session('success')['message'] !!}
                        </div>
                    </div>
                @endif
            </div>
            <div class="">
                <form action="@can('edit-catatan') {{ route('dashboard.catatan.update') }} @endcan" method="post">
                    @csrf
                    {{-- input hidden for all parameters --}}
                    <input type="hidden" name="idCatatan" value="{{ $catatan->id }}">
                    {{-- judul catatan --}}
                    <div class="">
                        <div class="flex gap-x-2 w-full items-center">
                            <div class="">
                                <img src="{{ asset('assets/icons/notepad.png') }}" alt="" class="h-12 w-auto">
                            </div>
                            <div class="w-full">
                                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-tertiary">Judul
                                    Catatan</label>
                                <input data-te-toggle="tooltip" title="{{ $catatan->judul }}" type="text"
                                    name="judulCatatan" id="judul-catatan" value="{{ $catatan->judul }}"
                                    class="block font-medium w-full transition-all rounded border-neutral-300"
                                    @if (!auth()->user()->can('edit-catatan')) readonly @endif>
                                @error('judulCatatan')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="px-2 py-2 mt-2">
                            {{-- kategori catatan --}}
                            <div class="flex flex-col sm:flex-row gap-y-2 gap-x-8 sm:items-center">
                                <div class="flex gap-x-2">
                                    <div class="">
                                        <img src="{{ asset('assets/icons/note.png') }}" alt="" class="h-5 w-auto">
                                    </div>
                                    <h5 class="text-sm text-dark-secondary">
                                        <span
                                            class="inline-block whitespace-nowrap rounded-full bg-neutral-800 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-neutral-50 dark:bg-neutral-900">
                                            {{ $catatan->jenisCatatan->nama }}
                                        </span>
                                    </h5>
                                </div>
                                {{-- pembuat --}}
                                <div class="flex gap-x-2 items-center">
                                    <div class="">
                                        <img src="{{ asset('assets/icons/user.png') }}" alt="" class="h-5 w-auto">
                                    </div>
                                    <h5 class="text-xs text-dark-secondary">
                                        <span class="font-medium text-dark-secondary">{{ $catatan->pembuat }}</span>
                                    </h5>
                                </div>
                                {{-- tanggal pembuatan --}}
                                <div class="text-sm text-dark-secondary items-center flex gap-x-2">
                                    <div class="">
                                        <img src="{{ asset('assets/icons/calendar.png') }}" alt=""
                                            class="h-5 w-auto">
                                    </div>
                                    <span class="text-xs font-medium text-dark-tertiary">
                                        {{ $catatan->created_at->isoFormat('dddd, D MMMM Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-4">
                            {{-- isi catatan --}}
                            <label for="catatan" class="block mb-2 font-medium caption text-dark-secondary">Isi
                                Catatan</label>
                            @error('isiCatatan')
                                <span class="text-xs text-danger-600">{{ $message }}</span>
                            @enderror
                            <textarea name="isiCatatan" id="catatan" cols="30" class="text-sm h-[700px] md:h-[800px]" readonly>{{ $catatan->isi }}</textarea>
                        </div>
                        <div class="flex justify-between mt-4">
                            <a href="{{ route('dashboard.catatan.index') }}" class="btn-secondary">Kembali</a>
                            @can('edit-catatan')
                                <button type="submit" class="btn-primary">Simpan Perubahan</button>
                            @endcan
                        </div>
                </form>
            </div>
            <script src="https://cdn.tiny.cloud/1/9fdxmwc8bgyw07t5mlpf6rt09hdcxgln0ce5e3jniqd1emb0/tinymce/6/tinymce.min.js"
                referrerpolicy="origin"></script>
            <script>
                tinymce.init({
                    selector: '#catatan',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            </script>
        </div>
    </div>
@endsection
