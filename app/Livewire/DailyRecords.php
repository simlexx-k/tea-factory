<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Farmer;
use Livewire\Component;
use App\Models\DailyTeaRecords;
use Illuminate\Validation\ValidationException;
class DailyRecords extends Component

{
    public $farmer_id;
    public $farmer_name;
    public $supply_date;
    public $tea_quantity;

    public function updatedFarmerId($value)
    {
        // Fetch the farmer name based on the selected ID and assign it to $farmer_name
        $this->farmer_name = Farmer::find($value)->name;
    }

    public function mount()
    {
        // Set the supply date to the current date
        $this->supply_date = Carbon::now()->toDateString();
    }

    public function save()
    {
        // Validate the input fields
        $validatedData = $this->validate([
            'farmer_id' => 'required|exists:farmers,id',
            'supply_date' => 'required|date',
            'tea_quantity' => 'required|numeric|min:0',
        ]);

        // Check if a record already exists for the given farmer_id and supply_date
        $existingRecord = DailyTeaRecords::where('farmer_id', $validatedData['farmer_id'])
            ->where('supply_date', $validatedData['supply_date'])
            ->exists();

        // If a record already exists, throw an error
        if ($existingRecord) {
            throw ValidationException::withMessages(['supply_date' => 'A record for this day already exists for the selected farmer.']);
        }

        // Create a new DailyTeaSupply record
        DailyTeaRecords::create([
            'farmer_id' => $validatedData['farmer_id'],
            'farmer_name' => $this->farmer_name, // Assign the farmer name directly
            'supply_date' => $validatedData['supply_date'],
            'tea_quantity' => $validatedData['tea_quantity'],
        ]);

        // Reset the form fields after successful submission
        $this->reset(['farmer_id', 'farmer_name', 'tea_quantity']);

        // Optionally, you can add a success message
        session()->flash('success', 'Daily tea supply record saved successfully!');
    }
    public function render()
    {
        return view('livewire.daily-records');
    }
    // Other methods...
}


