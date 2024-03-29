<div>
    <div class="">
        @can('buat-kategori-keuangan')
            <div class="">
                <!--Button trigger vertically centered scrollable modal-->
                <button type="button"
                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-toggle="modal" data-te-target="#exampleModalCenteredScrollable" data-te-ripple-init
                    data-te-ripple-color="light" data-te-target="#exampleModalCenteredScrollableLabel">
                    Buat Kategori Keuangan Baru
                </button>

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
                                <div class="flex gap-x-2 items-center">
                                    <div class="">
                                        <img src="{{ asset('assets/icons/money.png') }}" alt="" class="h-16 w-auto">
                                    </div>
                                    <div class="">
                                        <h5 class="heading-6 font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                            id="exampleModalCenteredScrollableLabel">
                                            Buat Kategori Keuangan Baru
                                        </h5>
                                        <h6 class="text-dark-secondary text-sm">

                                        </h6>
                                    </div>
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

                            <livewire:dashboard.keuangan.kelola.create-form />
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
    <div class="mt-6">
        <div class="w-full 2xl:w-9/12">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-4">
                    <h3 class="font-semibold subheading-5">
                        Daftar Keuangan Karangtaruna Berdikari
                    </h3>
                </div>
                <div class="flex w-full md:max-w-min gap-x-8">
                    <div class="w-full md:w-96">
                        <div class="mb-3">
                            <div class="relative flex flex-wrap items-stretch w-full mb-4 bg-white">
                                <input type="search" wire:model="search"
                                    class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                    placeholder="Cari" aria-label="Search" aria-describedby="button-addon1" />

                                <!--Search button-->
                                <button
                                    class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                    type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <livewire:dashboard.keuangan.kelola.table>
            </div>
        </div>
    </div>
</div>
@push('script_after')
    <script>
        // sweet alert
        window.addEventListener('create-kategori-keuangan-success', event => {
            window.Swal.fire({
                icon: 'success',
                title: event.detail.title,
                text: event.detail.message,
            })
        })
        window.addEventListener('delete-kategori-keuangan-success', event => {
            window.Swal.fire({
                icon: 'success',
                title: event.detail.title,
                text: event.detail.message,
            })
        })
        window.addEventListener('update-kategori-keuangan-success', event => {
            window.Swal.fire({
                icon: 'success',
                title: event.detail.title,
                text: event.detail.message,
            })
        })
    </script>
@endpush
