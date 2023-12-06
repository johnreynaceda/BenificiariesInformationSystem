<div>
    <div class="bg-gray-200 rounded-xl p-5 w-1/2">
        <h1 class="text-center font-bold text-2xl uppercase text-gray-700">Announcement</h1>
        <div class="mt-5">
            {{ $this->form }}
            <div class="mt-5">
                <x-button label="Submit" icon="inbox-in" wire:click="submit" dark />
            </div>
        </div>
    </div>
    <div class="mt-10">
        {{ $this->table }}
    </div>
</div>
