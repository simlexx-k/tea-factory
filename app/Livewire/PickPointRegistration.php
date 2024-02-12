<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PickPoint;

class PickPointRegistration extends Component
{
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|unique|max:255',
        'description' => 'required|string|max:255',
        // Add more validation rules as needed
    ];
    public function render()
    {
        return view('livewire.pick-point-registration');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        PickPoint::create($validatedData);

        session()->flash('success', 'Pick point added successfully!');

        $this->reset(['name', 'description']);
    }
}
