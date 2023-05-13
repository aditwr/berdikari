<div class="relative p-4">


    <form class="w-full" wire:submit.prevent="update">
        <div class="relative">
            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Nama Keuangan</label>
                <input type="text" wire:model="namaKeuangan"
                    class="block w-full transition-all rounded border-neutral-300" />
                @error('namaKeuangan')
                    <span class="text-xs text-danger-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Keterangan <span
                        class="font-normal">(Optional)</span></label>
                <textarea wire:model="keterangan" class="block w-full transition-all rounded border-neutral-300"></textarea>
                @error('keterangan')
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
