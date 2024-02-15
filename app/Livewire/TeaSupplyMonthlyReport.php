<?php

// TeaSupplyMonthlyReport.php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Farmer;
use App\Models\DailyTeaRecords;

class TeaSupplyMonthlyReport extends Component
{
    public $selectedMonth;
    public $selectedFarmer;
    public $farmers;
    public $teaSupplyRecords = [];
    public $totalTeaQuantity;

    public function mount()
    {
        // Fetch the list of farmers
        $this->farmers = Farmer::all();
    }

    public function render()
    {
        return view('livewire.tea-supply-monthly-report');
    }

    public function getTeaRecords()
    {
        $selectedMonthDate = Carbon::parse($this->selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($this->selectedMonth)->endOfMonth();

        // Query daily tea supply records
        $query = DailyTeaRecords::query()
            ->whereBetween('supply_date', [$selectedMonthDate, $endOfMonth]);

        if ($this->selectedFarmer) {
            $query->where('farmer_id', $this->selectedFarmer);
        }

        $this->teaSupplyRecords = $query->get();
        $this->totalTeaQuantity = $query->sum('tea_quantity');
    }
}
