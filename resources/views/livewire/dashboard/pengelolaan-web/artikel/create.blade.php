<div class="dashboard-padding-responsive">
    <div class="">
        <x-dashboard.breadcrumb>
            <a href="#" class="text-gray-500 hover:text-primary-700">Pengelolaan Web</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Artikel</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-dark-primary hover:text-primary-700">Tambah</a>
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

        <form action="" wire:submit.prevent='store' method="POST" class="block w-full">
            @csrf
            <div class="mb-6">
                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Judul
                    Artikel</label>
                <div class="flex w-full gap-x-2 items-center">
                    <div class="">
                        <img src="{{ asset('assets/icons/article.png') }}" alt="" class="h-10 w-auto">
                    </div>
                    <div class="flex-grow">
                        <input type="text" name="judul" wire:model="judul" id="judul-catatan"
                            class="block w-full transition-all rounded border-neutral-300" required>
                    </div>
                </div>
                @error('judul')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <h3 class="mb-2 font-medium caption">Kategori</h3>
                <div class="flex w-full gap-x-2 items-center">
                    <div class="">
                        <img src="{{ asset('assets/icons/folder.png') }}" alt="" class="h-10 w-auto">
                    </div>
                    <div class="flex-grow">
                        <select required wire:model='kategori' class="rounded">
                            <option value="">-- Pilih --</option>
                            @foreach ($kategoriArtikel as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Gambar</label>
                {{-- image preview --}}
                @if ($gambar)
                    <div class="w-full sm:w-96 h-52 flex justify-center items-center overflow-hidden mb-2">
                        <img src="{{ $gambar->temporaryUrl() }}" alt=""
                            class="h-full my-2 rounded w-full object-cover">
                    </div>
                @endif
                <div x-data="{ isUploading: false, progress: 0, finish: false }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="finish = true; isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <div class="flex w-full gap-x-2 items-center">
                        <div class="">
                            <img src="{{ asset('assets/icons/image.png') }}" alt="" class="h-10 w-auto">
                        </div>
                        <div class="flex-grow">
                            <div class="w-full sm:w-96">
                                <input type="file" name="gambar" wire:model="gambar" id="fotoKegiatan"
                                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    id="formFile" required />
                            </div>
                        </div>
                    </div>

                    {{-- Progress Bar --}}
                    <div x-show="isUploading" class="my-2 w-96">
                        <div class="bg-grayy-200 h-[2px]">
                            <div x-bind:style="`width: ${progress}%`"
                                class="bg-primary h-[2px] transition-all duration-300 ease-linear"></div>
                        </div>
                    </div>
                    {{-- Finish --}}
                    <div wire:loading wire:target='gambar'>
                        <div class="flex mt-3 gap-x-2">
                            <div class="w-6 h-6">
                                <x-dashboard.loader />
                            </div>
                            Mengupload Foto...
                        </div>
                    </div>
                </div>
                @error('gambar')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 mt-8">
                <label for="catatan" class="block mb-2 font-medium caption text-dark-secondary">Isi Artikel</label>
                @error('isi')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
                <div wire:ignore class="">
                    <textarea name="isi" wire:model="isi" id="isi" cols="30" rows="30" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn-primary">Buat Artikel</button>
        </form>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/9fdxmwc8bgyw07t5mlpf6rt09hdcxgln0ce5e3jniqd1emb0/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#isi',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            setup: function(editor) {
                editor.on('init', function(e) {
                    editor.setContent('{!! $isi !!}');
                });
                editor.on('change', function(e) {
                    @this.set('isi', editor.getContent());
                });
            }
        });
    </script>
@endpush
