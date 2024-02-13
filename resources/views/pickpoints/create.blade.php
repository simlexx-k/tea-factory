<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pick Points') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('pick-point-registration')
    </div>
    <x-section-border />
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('pick-point-list')
    </div>

</x-app-layout>

