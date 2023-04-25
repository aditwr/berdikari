<div>
    <div class="">
        <h3 class="mb-2 font-medium caption">Pilih Keuangan</h3>
        <div class="flex justify-start">
            <div class="xl:w-64 2xl:w-64">
                <select wire:model='keuanganAktif' class="w-full overflow-hidden rounded">
                    @foreach ($keuangans as $keuangan)
                        <option value="{{ $keuangan->slug }}">{{ $keuangan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
