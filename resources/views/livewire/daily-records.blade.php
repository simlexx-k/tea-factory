<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Add Tea Supplies') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Add new daily tea supply records using this form.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="farmer_id" value="{{ __('Farmer ID') }}" />
                <x-input id="farmer_id" type="text" class="mt-1 block w-full" wire:model="farmer_id" required autofocus />
                <x-input-error for="farmer_id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="farmer_name" value="{{ __('Farmer Name') }}" />
                <x-input id="farmer_name" type="text" class="mt-1 block w-full" wire:model="farmer_name" disabled />
                <x-input-error for="farmer_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="supply_date" value="{{ __('Supply Date') }}" />
                <x-input id="supply_date" type="text" class="mt-1 block w-full" wire:model="supply_date" disabled />
                <x-input-error for="supply_date" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="tea_quantity" value="{{ __('Tea Quantity (kgs)') }}" />
                <x-input id="tea_quantity" type="number" class="mt-1 block w-full" wire:model="tea_quantity" required />
                <x-input-error for="tea_quantity" class="mt-2" />
            </div>
        </x-slot>


        <x-slot name="actions">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
