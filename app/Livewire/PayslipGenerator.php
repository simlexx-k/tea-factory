<?php

// app/Http/Livewire/PayslipGenerator.php

// PayslipLivewireComponent.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Farmer;
use App\Models\DailyTeaRecords;

class PayslipGenerator extends Component
{
    public $selectedMonth;
    public $farmers;

    public function mount()
    {
        // Fetch the list of farmers
        $this->farmers = Farmer::all();
    }

    public function render()
    {
        return view('livewire.payslip-generator');
    }

    public function generatePayslips()
    {
        // Retrieve data and generate payslips for each farmer
        foreach ($this->farmers as $farmer) {
            // Retrieve tea submission records for the selected month
            $teaSubmissions = DailyTeaRecords::where('farmer_id', $farmer->id)
                ->whereMonth('supply_date', $this->selectedMonth)
                ->get();

            // Calculate total pay for the farmer based on tea submissions
            $totalPay = $teaSubmissions->sum('tea_quantity') * $farmer->pay_rate;

            // Generate payslip for the farmer
            // Store or display the payslip as needed
        }
    }
}

