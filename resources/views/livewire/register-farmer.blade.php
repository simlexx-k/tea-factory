<!-- resources/views/livewire/register-farmer.blade.php -->

<div>
    <form wire:submit.prevent="register">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="pickpoint">Pick Point:</label>
            <input type="text" id="pickpoint" wire:model="pickpoint" required>
            @error('pickpoint') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" wire:model="phone" required>
            @error('phone') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="account">Account:</label>
            <input type="number" id="account" wire:model="account" required>
            @error('account') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="isValid">isValid:</label>
            <input type="checkbox" id="isValid" wire:model="isValid" required>
            @error('isValid') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Register Farmer</button>
    </form>
</div>
