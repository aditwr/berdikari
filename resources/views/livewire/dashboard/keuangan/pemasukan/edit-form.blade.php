<div class="relative p-4">
    <!--Modal body-->
    @if ($notification['show'])
        {{-- alert --}}
        <div class="flex items-center px-3 py-3 mb-3 bg-success-200">
            <p class="text-sm basis-full text-dark-secondary">Pemasukan baru dengan judul " <span
                    class="font-medium">{{ $notification['judul'] }}</span> " berhasil
                diubah!</p>
            {{-- close button --}}
            <button type="button" wire:click="closeNotification" class="">
                <svg class="w-5 h-5 text-gray-400 hover:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    <form class="w-full" wire:submit.prevent="update">
        <div class="relative">
            <div class="relative mb-4">
                {{ $judulPemasukan }}
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Judul Pemasukan</label>
                <input type="text" wire:model="judulPemasukan"
                    class="block w-full transition-all rounded border-neutral-300" />
                @error('judulPemasukan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Nominal
                    Pemasukan</label>
                <input disabled type="text" wire:model="nominalPemasukan"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                <span class="block px-1 my-1 text-xs text-info-700">demi catatan keuangan yang sinkron dan konsisten,
                    nominal
                    pemasukan
                    lampau tidak dapat
                    diubah</span>
                @error('nominalPemasukan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Keterangan <span
                        class="font-normal">(Optional)</span></label>
                <textarea wire:model="keteranganPemasukan" class="block w-full transition-all rounded border-neutral-300"></textarea>
                @error('keteranganPemasukan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!--Modal footer-->
        <div
            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
            <button type="button"
                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                Tutup
            </button>
            <button type="submit"
                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init data-te-ripple-color="light">
                Ubah Data
            </button>
        </div>
    </form>
</div>
