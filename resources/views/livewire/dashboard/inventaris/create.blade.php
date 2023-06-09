<div>
    <div class="">
        <div class="">
            <!--Button trigger vertically centered scrollable modal-->
            <button type="button"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-toggle="modal" data-te-target="#exampleModalCenteredScrollable" data-te-ripple-init
                data-te-ripple-color="light" data-te-target="#exampleModalCenteredScrollableLabel">
                + Barang Inventaris
            </button>
        </div>

        <!--Verically centered scrollable modal-->
        <div data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable"
            aria-modal="true" role="dialog" data-te-backdrop="static" data-te-keyboard="false">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                <div
                    class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                    <div
                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                        <!--Modal title-->
                        <div class="">
                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                id="exampleModalCenteredScrollableLabel">
                                Tambah Barang Inventaris
                            </h5>
                            <h6 class="font-medium text-dark-secondary">{{ $jenisInventaris->nama }}</h6>
                        </div>
                        <!--Close button-->
                        <button type="button"
                            class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="relative p-4">
                        <div class="relative">
                            <div class="relative mb-4">
                                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Nama
                                    Barang</label>
                                <input type="text" wire:model.defer="namaBarang"
                                    class="block w-full transition-all rounded border-neutral-300" />
                                @error('namaBarang')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Jumlah
                                    Barang</label>
                                <input type="number" wire:model.defer="jumlahBarang"
                                    class="block w-full transition-all rounded border-neutral-300" />
                                @error('jumlahBarang')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for=""
                                    class="block mb-2 font-medium caption text-dark-secondary">Kondisi</label>
                                <select wire:model.defer='kondisiBarang' class="w-full overflow-hidden rounded">
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Tidak Bisa Digunakan">Tidak bisa digunakan</option>
                                </select>
                                @error('kondisiBarang')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="" class="block mb-2 font-medium caption text-dark-secondary">Lokasi
                                    Barang</label>
                                <input type="text" wire:model.defer="lokasiBarang"
                                    class="block w-full transition-all rounded border-neutral-300" />
                                @error('lokasiBarang')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for=""
                                    class="block mb-2 font-medium caption text-dark-secondary">Pemegang</label>
                                <input type="text" wire:model.defer="pemegang"
                                    class="block w-full transition-all rounded border-neutral-300" />
                                @error('pemegang')
                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for=""
                                    class="block mb-2 font-medium caption text-dark-secondary">Keterangan <span
                                        class="font-normal">(Optional)</span></label>
                                <textarea wire:model.defer="keterangan" class="block w-full transition-all rounded border-neutral-300"></textarea>
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
                            <button type="button" wire:click="store"
                                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light" data-te-modal-dismiss>
                                Simpan Pemasukan
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
