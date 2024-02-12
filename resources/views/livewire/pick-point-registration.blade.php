<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Add Pick Point') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Add new tea pick up points using this form.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <x-input id="description" class="mt-1 block w-full" wire:model="description" required></x-input>
                <x-input-error for="description" class="mt-2" />
                <x-label> {{ __('TO SORT LATER: You may provide the coordinates of the pick point in the description field') }}</x-label>
            </div>

        </x-slot>


        <x-slot name="actions">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
