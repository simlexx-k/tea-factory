<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Farmer;

class RegisterFarmer extends Component
{
    public $name;
    public $email;
    public $pickpoint;
    public $phone;
    public $account;
    public $isValid;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:farmers|max:255',
        'pickpoint' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'account' => 'required|string|max:255',
        'isValid' => 'required|boolean',
        // Add more validation rules as needed
    ];

    public function register()
    {
        $this->validate();

        Farmer::create([
            'name' => $this->name,
            'email' => $this->email,
            'pickpoint' => $this->pickpoint,
            'phone' => $this->phone,
            'account' => $this->account,
            'isValid' => $this->isValid,
            // Add more fields as needed
        ]);

        session()->flash('success', 'Farmer registered successfully!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.register-farmer');
    }
}
