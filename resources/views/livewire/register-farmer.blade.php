<div>
    <!-- Something shall live here -->
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Add a Farmer') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Add new farmers to the system using this form.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="mt-1 block w-full" wire:model="email" required></x-input>
                <x-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="pickpoint" value="{{ __('Pick Point') }}">Pick Point</x-label>
                <select wire:model="pickpoint" id="pickpoint" class="form-control">
                    <option value=" ">Select Pick Point</option>
                    @foreach($pickpoint as $name)
                        <option value="{{ $name }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('pickpoint') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Phone Number') }}" />
                <x-input id="phone" class="mt-1 block w-full" wire:model="phone" required></x-input>
                <x-input-error for="phone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="account" value="{{ __('Account Number') }}" />
                <x-input id="account" type="text" class="mt-1 block w-full" wire:model="account" required autofocus />
                <x-input-error for="account" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="isValid" value="{{ __('Validated Farmer') }}" />
                <label for="isValid" class="inline-flex items-center">
                    <x-input type="checkbox" id="isValid" wire:model="isValid" class="form-checkbox h-5 w-5 text-indigo-600"/>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Is Validated') }}</span>
                </label>
                <x-input-error for="isValid" class="mt-2" />
            </div>


        </x-slot>
        <x-slot name="actions">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>

