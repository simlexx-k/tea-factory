<?php

namespace App\Livewire;

use App\Models\PickPoint;
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

    public function mount()
    {
        $this->pickpoint = PickPoint::pluck('name')->toArray(); // Fetch pick points from the database
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:farmers|max:255',
        'pickpoint' => 'required|max:255',
        'phone' => 'required|string|max:255',
        'account' => 'required|string|max:255',
        'isValid' => 'required|boolean',
        // Add more validation rules as needed
    ];

    //public function mount()
    //{
    //    $pickPoints = PickPoint::pluck('name', 'id');

        // Ensure $pickPoints is not null
    //    $this->pickpoint = $pickPoints ?: [];
    //}

    public function save()
    {
        $processedPickpoint = implode(', ', $this->pickpoint);
        $this->validate();

        Farmer::create([
            'name' => $this->name,
            'email' => $this->email,
            'pickpoint' => $this->$processedPickpoint,
            'phone' => $this->phone,
            'account' => $this->account,
            'isValid' => $this->isValid,
            // Add more fields as needed
        ]);

        session()->flash('success', 'Farmer registered successfully!');

        $this->reset(['name', 'pickpoint', 'phone', 'account', 'isValid']);
    }

    public function render()
    {
        return view('livewire.register-farmer');
    }
}
