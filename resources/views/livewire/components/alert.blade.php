@if ($show)
    <div class="fixed left-0 z-50 w-full px-3 py-2 sm:w-96 top-8">
        <div
            class="relative flex items-start px-3 py-4 rounded shadow @if ($type == 'success') bg-success-100
            @elseif ($type == 'error')
            bg-red-100 @endif">
            <div class="w-full pr-1">
                <h5 class="text-sm font-medium">{{ $message }}</h5>
                {{-- <p class="text-xs">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia ipsa et repellendus qui!
            </p> --}}
            </div>
            <div class="">
                <button type="button" wire:click="$toggle('show')" class="p-1 rounded-full hover:bg-white">
                    <svg class="w-6 h-6 transition-all text-dark-secondary hover:text-dark-primary" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

            </div>
        </div>
    </div>
@else
    <div class=""></div>
@endif
