@push('scripts')
    <script src="https://cdn.tiny.cloud/1/9fdxmwc8bgyw07t5mlpf6rt09hdcxgln0ce5e3jniqd1emb0/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endpush


<div>
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

        <form action="{{ route('dashboard.catatan.simpan') }}" method="POST" class="block w-full">
            @csrf
            <div class="w-full mb-4">
                <label for="jenis-catatan" class="block mb-2 font-medium caption text-dark-secondary">Pilih Jenis
                    Catatan</label>
                <div class="">
                    <select class="rounded" name="idJenisCatatan">
                        @foreach ($daftarJenisCatatan as $jenisCatatan)
                            <option value="{{ $jenisCatatan->id }}">{{ $jenisCatatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @error('idJenisCatatan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="judul-catatan" class="block mb-2 font-medium caption text-dark-secondary">Judul
                    Catatan</label>
                <input type="text" name="judulCatatan" id="judul-catatan"
                    class="block w-full transition-all rounded border-neutral-300">
                @error('judulCatatan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="catatan" class="block mb-2 font-medium caption text-dark-secondary">Isi Catatan</label>
                @error('isiCatatan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
                <textarea name="isiCatatan" id="catatan" cols="30" rows="30"></textarea>
            </div>
            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        tinymce.init({
            selector: '#catatan',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endpush
