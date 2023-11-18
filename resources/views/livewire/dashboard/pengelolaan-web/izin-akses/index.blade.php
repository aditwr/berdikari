<div>
    <div class="w-full 2xl:w-9/12">
        {{-- toast --}}
    </div>
    <div class="">
        <div class="w-full 2xl:w-9/12 mb-10">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-3">
                    <h3 class="font-semibold subheading-5">
                        Beri Izin Akses
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
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-72 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-40 py-3 pl-2 ">Tanggal dibuat</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Beri Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-72 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $user->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $user->email }}
                                                </td>
                                                <td class="w-40 py-2 pl-2 font-normal whitespace-nowrap">
                                                    {{-- format date : date_format --}}
                                                    {{ date_format(date_create($user->created_at), 'D, d F Y') }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" {{-- wire:click="$set('user', {{ $user }})" --}}
                                                        onclick="Livewire.emit('userUpdated', {{ $user }})"
                                                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#staticBackdrop"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Beri Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div data-te-modal-init wire:ignore
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                    <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                        <div
                                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                id="staticBackdropLabel">
                                                Beri Hak Akses
                                            </h5>
                                            <!--Close button-->
                                            <button type="button"
                                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                data-te-modal-dismiss aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!--Modal body-->
                                        <div data-te-modal-body-ref class="relative p-4">
                                            <div class="">
                                                <p id="user-name" class="text-md font-medium">...</p>
                                                <p id="user-email" class="text-md font-medium">...</p>
                                                <input id="user-id" type="hidden">
                                            </div>
                                            <div class="">
                                                <select id="chosed_role"
                                                    onchange="Livewire.emit('roleSelected', this.value)"
                                                    data-te-select-init>
                                                    <option value="none">-- Pilih Peran --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="ketua">Ketua</option>
                                                    <option value="bendahara">Bendahara</option>
                                                    <option value="sekretaris">Sekretaris</option>
                                                    <option value="seksi-inventaris">Seksi Inventaris</option>
                                                    <option value="anggota">Anggota</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!--Modal footer-->
                                        <div
                                            class="flex flex-shrink-0 flex-wrap gap-x-4 items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <button type="button"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                Batal
                                            </button>
                                            <button type="button" id="button-beri-hak-akses"
                                                onclick="beriHakAkses()" data-te-modal-dismiss data-te-ripple-init
                                                data-te-ripple-color="light"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                                                Beri Hak Akses
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>


        {{-- table admin --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Admin
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($admins->count() > 0)
                                        @foreach ($admins as $admin)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $admin->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $admin->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" {{-- wire:click="$set('admin', {{ $admin }})" --}}
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $admin }}, hak: 'Admin' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>

        {{-- table ketua --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Ketua
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($ketuas->count() > 0)
                                        @foreach ($ketuas as $ketua)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $ketua->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $ketua->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $ketua }}, hak: 'ketua' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>

        {{-- table bendahara --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Bendahara
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($bendaharas->count() > 0)
                                        @foreach ($bendaharas as $bendahara)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $bendahara->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $bendahara->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $bendahara }}, hak: 'bendahara' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>

        {{-- table sekretarus --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Sekretaris
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sekretariss->count() > 0)
                                        @foreach ($sekretariss as $sekretaris)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $sekretaris->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $sekretaris->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $sekretaris }}, hak: 'sekretaris' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>

        {{-- table seksi-inventaris --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Seksi Inventaris
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($seksi_inventariss->count() > 0)
                                        @foreach ($seksi_inventariss as $seksi_inventaris)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $seksi_inventaris->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $seksi_inventaris->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $seksi_inventaris }}, hak: 'seksi_inventaris' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>


        {{-- table anggota --}}
        <div class="w-full md:w-min">
            <div class="flex flex-col items-baseline mb-3 md:justify-between md:flex-row">
                <div class="mb-1">
                    <h3 class="font-semibold subheading-5">
                        Anggota
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden bg-white rounded shadow-sm">
                <div class="">
                    <div class="">
                        <div class="flex flex-col w-full overflow-x-auto">
                            <table class="w-full overflow-x-auto text-sm font-normal text-left">
                                <thead class="overflow-hidden rounded">
                                    <tr
                                        class="flex items-center justify-between text-xs border-b-2 border-neutral-100 lg:px-2">
                                        <th scope="col" class="w-8 py-3 text-center ">No</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Nama</th>
                                        <th scope="col" class="w-56 py-3 pl-2 ">Email</th>
                                        <th scope="col" class="w-52 px-2 py-3 text-center ">Hapus Hak Akses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($anggotas->count() > 0)
                                        @foreach ($anggotas as $anggota)
                                            <tr
                                                class="flex my-1 items-center justify-between  text-xs border-b-2 border-neutral-100 dark:border-neutral-500 hover:bg-neutral-50 lg:px-2">
                                                <td
                                                    class="flex items-center justify-center w-8 py-2 font-medium text-center whitespace-nowrap text-dark-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="flex items-center w-56 py-2 ">
                                                    <p class="font-medium text-dark-secondary line-clamp-1">
                                                        {{ $anggota->name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="flex items-center w-56 py-2 pl-2 text-sm break-words whitespace-normal">
                                                    <p class="font-medium text-success-600">
                                                        {{ $anggota->email }}
                                                </td>
                                                <td class="w-52 py-2 pl-2 text-sm flex justify-center gap-x-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        onclick="window.dispatchEvent(new CustomEvent('setHapusIzinAkses', { detail: { user: {{ $anggota }}, hak: 'anggota' } }))"
                                                        class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                        data-te-toggle="modal" data-te-target="#hapusIzinAkses"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Hapus Hak Akses
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="w-[92vw] md:w-full h-48 flex justify-center items-center">
                                            <td class="">
                                                <img src="{{ asset('assets/illustrations/data-not-found.png') }}"
                                                    alt="" class="w-auto h-32">
                                                <p class="font-medium text-center text-gray-500">Belum ada user dengan
                                                    hak akses ini!</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- pagination --}}
            <div class="px-2 mt-4 mb-3">
                {{-- {{ $pemasukans->links() }} --}}
            </div>
        </div>


        {{-- Delete Modal --}}
        <!-- Modal Hapus Hak Akses -->
        <div data-te-modal-init wire:ignore
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="hapusIzinAkses" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
            role="dialog">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalCenterTitle">
                            Hapus Hak Akses
                        </h5>
                        <!--Close button-->
                        <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative p-4">
                        <p>Hapus hak akses sebagai <b id="hak-akses-dihapus">...</b> dari user
                            <span id="user-hapus-hak-akses">...</span>
                        </p>
                        {{-- user id --}}
                        <input id="user-id-hapus" type="hidden">
                    </div>

                    <!--Modal footer-->
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            Batal
                        </button>
                        <button type="button" onclick="hapusHakAkses()" data-te-modal-dismiss
                            class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endpush

@push('script_after')
    <script>
        let selectRole = document.getElementById('chosed_role');
        let select = te.Select;
        te.initTE({
            select
        });
        let roleSelectInstance = select.getInstance(selectRole);

        Livewire.on('userUpdated', (user) => {
            document.getElementById('user-name').innerHTML = user.name;
            document.getElementById('user-email').innerHTML = user.email;
            document.getElementById('user-id').value = user.id;
            document.getElementById('button-beri-hak-akses').setAttribute('disabled');
            Livewire.emit('roleSelected', 'none');
            // set selected to none
            roleSelectInstance.setValue("none");
            // reset value select 
            document.getElementById('button-beri-hak-akses').className =
                "inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200";
        })

        Livewire.on('roleSelected', (role) => {
            if (role !== "none") {
                // delete disabled attribute
                document.getElementById('button-beri-hak-akses').removeAttribute('disabled');
                document.getElementById('button-beri-hak-akses').className =
                    "inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]";
            } else {
                document.getElementById('button-beri-hak-akses').setAttribute('disabled');
            }

        })

        function beriHakAkses() {
            let user_id = document.getElementById('user-id').value;
            let role = document.getElementById('chosed_role').value;

            Livewire.emit('beriHakAkses', user_id, role);
        }

        // Hapus Hak Akses

        window.addEventListener('setHapusIzinAkses', function(event) {
            document.getElementById('user-id-hapus').value = event.detail.user.id;
            document.getElementById('user-hapus-hak-akses').innerHTML = event.detail.user.name;
            document.getElementById('hak-akses-dihapus').innerHTML = event.detail.hak;
        })


        function hapusHakAkses() {
            let user_id_hapus = document.getElementById('user-id-hapus').value;
            Livewire.emit('hapusHakAkses', user_id_hapus);
        }

        // alert pemberian hak akses berhasil
        window.addEventListener('beriHakAksesBerhasil', (event) => {
            Swal.fire({
                title: 'Berhasil',
                html: 'Berhasil memberikan hak akses <b>' + event.detail[1] + '</b> kepada user <b>' + event
                    .detail[0].name + '</b>',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        });

        // alert penghapusan hak akses berhasil
        window.addEventListener('hapusHakAksesBerhasil', (event) => {
            Swal.fire({
                title: 'Berhasil',
                text: 'Hak Akses dari user ' + event.detail.name + ' berhasil dihapus',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        })
    </script>
@endpush
