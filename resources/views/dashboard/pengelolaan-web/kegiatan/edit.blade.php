@extends('dashboard.layouts.dashboard')

@section('title')
    Ubah Artikel Kegiatan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Kegiatan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Edit</a>
            </x-dashboard.breadcrumb>
        </div>
        <div class="w-full 2xl:w-9/12">
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
            {{-- end toast --}}

            <form action="{{ route('dashboard.pengelolaan-web.kegiatan.update') }}" enctype="multipart/form-data"
                method="POST" class="block w-full">
                @csrf
                <input type="hidden" name="id" value="{{ $kegiatan->id }}">
                <input type="hidden" name="fotoLama" value="{{ $kegiatan->gambar }}">
                <div class="mb-4">
                    <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Judul
                        Kegiatan</label>
                    <div class="flex w-full gap-x-2 items-center">
                        <div class="">
                            <img src="{{ asset('assets/icons/article.png') }}" alt="" class="h-10 w-auto">
                        </div>
                        <div class="flex-grow">
                            <input type="text" name="judul_kegiatan" value="{{ $kegiatan->judul_kegiatan }}"
                                id="judul-catatan" class="block w-full transition-all rounded border-neutral-300" required>
                        </div>
                    </div>
                    @error('judul_kegiatan')
                        <span class="text-xs text-danger-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 w-full sm:w-96">
                    <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Foto
                        Kegiatan</label>
                    {{-- image preview --}}
                    <div id="previous-img"
                        class="flex items-center justify-center mb-4 overflow-hidden rounded w-full h-52">

                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt=""
                            class="object-cover w-full h-full">
                    </div>
                    <div class="items-center justify-center hidden mb-4 overflow-hidden rounded w-96 h-52"
                        id="img-preview-container">
                        <div class="">
                            <img id="img-preview" src="#" alt="image-preview" class="object-cover w-full h-full">
                        </div>
                    </div>
                    {{-- end image preview --}}
                    <div class="flex w-full gap-x-2 items-center">
                        <img src="{{ asset('assets/icons/folder.png') }}" alt="" class="h-10 w-auto">
                        <div class="flex-grow">
                            <div class="w-full sm:w-96">
                                <input type="file" name="gambar" id="fotoKegiatan"
                                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    id="formFile" />
                            </div>
                        </div>
                    </div>

                    @error('gambar')
                        <span class="text-xs text-danger-600">{{ $message }}</span>
                    @enderror
                    <div id="notif-upload-foto" class="flex gap-x-2 px-2 py-2 mt-2 rounded bg-warning-100">
                        <span class="">
                            <svg class="w-4 h-4 text-warning-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <span class="text-xs text-warning-800 font-medium">Upload foto baru untuk mengganti foto
                            lama!</span>
                    </div>
                    <div id="notif-upload-foto-success" class="hidden px-2 py-1 mt-2 rounded bg-success-300">
                        <span class="text-sm font-medium">Foto baru berhasil diupload!</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="catatan" class="block mb-2 font-medium caption text-dark-secondary">Deskripsi</label>
                    @error('deskripsi')
                        <span class="text-xs text-danger-600">{{ $message }}</span>
                    @enderror
                    <div class="">
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="30" required>
                            {{ $kegiatan->deskripsi }}
                        </textarea>
                    </div>
                </div>
                <button type="submit" class="btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    @push('script_after')
        <script wire:ignore
            src="https://cdn.tiny.cloud/1/9fdxmwc8bgyw07t5mlpf6rt09hdcxgln0ce5e3jniqd1emb0/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script wire:ignore>
            tinymce.init({
                selector: '#deskripsi',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
        <script>
            // Livewire.emit('loadTinyMCE');
            const fotoKegiatan = document.getElementById('fotoKegiatan');
            const imgPreview = document.getElementById('img-preview');
            const imgPreviewContainer = document.getElementById('img-preview-container');
            const previousImg = document.getElementById('previous-img');

            fotoKegiatan.onchange = function() {
                const [file] = fotoKegiatan.files;
                if (file) {
                    imgPreviewContainer.classList.remove('hidden');
                    imgPreviewContainer.classList.add('flex');
                    previousImg.classList.add('hidden');
                    imgPreview.src = URL.createObjectURL(file);
                    document.getElementById('notif-upload-foto').classList.add('hidden');
                    document.getElementById('notif-upload-foto-success').classList.remove('hidden');
                }
            }
        </script>
    @endpush
@endsection
