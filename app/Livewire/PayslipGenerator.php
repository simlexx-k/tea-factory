<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Farmer;
use App\Models\DailyTeaRecords;

class PayslipGenerator extends Component
{
    public $selectedMonth;
    public $farmers;
    public $records;
    public $pay_rate;

    public function mount()
    {
        // Fetch the list of farmers
        $this->farmers = Farmer::all();
        $this->records = DailyTeaRecords::all();
        //$this->pay_rate = DailyTeaRecords::all('pay_per_kg');
    }

    public function render()
    {
        return view('livewire.payslip-generator');
    }

    /* public function generatePayslips()
    {
        // Retrieve data and generate payslips for each farmer
        foreach ($this->farmers as $farmer) {
            // Retrieve tea submission records for the selected month
            $teaSubmissions = DailyTeaRecords::where('farmer_id', $farmer->id)
                ->whereMonth('supply_date', $this->selectedMonth)
                ->get();

            // Calculate total pay for the farmer based on tea submissions
            $pay_per_kg = 45;
            $totalPay = $teaSubmissions->sum('tea_quantity') * 45;

            // Generate payslip for the farmer
            // Store or display the payslip as needed
        }
       dd($totalPay);
    }
*/
    /*public function generatePayslipsxx()
    {
        try {
            // Retrieve data and generate payslips for each farmer
            foreach ($this->farmers as $farmer) {
                // Retrieve tea quantity records for the selected month
                $teaQuantities = DailyTeaRecords::where('farmer_id', $farmer->id)
                    ->whereMonth('supply_date', $this->selectedMonth)
                    ->pluck('tea_quantity'); // Retrieve only the tea_quantity column

                // Log or output the generated SQL query for debugging
                logger()->info('SQL Query:', ['query' => DB::getQueryLog()]);

                // Check if any tea quantities were retrieved
                if ($teaQuantities->isEmpty()) {
                    throw new \Exception('No tea quantities found for farmer ID: ' . $farmer->id);
                }

                // Calculate total tea quantity for the farmer
                $totalTeaQuantity = $teaQuantities->sum();

                // Calculate total pay for the farmer based on tea quantity and pay rate
                $payRate = 45; // Replace this with the actual pay rate from DailyTeaRecords
                $totalPay = $totalTeaQuantity * $payRate;

                // Generate payslip for the farmer
                // Store or display the payslip as needed
            }

        } catch (\Exception $e) {
            // Handle exceptions and errors
            logger()->error('Error generating payslips: ' . $e->getMessage());
            // You can also log the stack trace or display a user-friendly error message
        }
        //print dd($teaQuantities);
    */
    public function generatePayslips()
    {
        // Retrieve data and generate payslips for each farmer
        foreach ($this->records as $record) {
            // Retrieve tea quantity records for the selected month
            $teaQuantities = DailyTeaRecords::where('farmer_id', $record->farmer_id)
                ->whereMonth('supply_date', $this->selectedMonth)
                ->pluck('tea_quantity'); // Retrieve only the tea_quantity column

            // Log or output the generated SQL query for debugging
            logger()->info('SQL Query:', ['query' => DB::getQueryLog()]);

            // Check if any tea quantities were retrieved
            if ($teaQuantities->isEmpty()) {
                throw new \Exception('No tea quantities found for farmer ID: ' . $record->farmer_id);
            }

            // Calculate total tea quantity for the farmer
            $totalTeaQuantity = $teaQuantities->sum();

            // Calculate total pay for the farmer based on tea quantity and pay rate
            $payRate = 45; // Replace this with the actual pay rate from DailyTeaRecords
            $totalPay = $totalTeaQuantity * 45;

            // Generate payslip for the farmer
            // Store or display the payslip as needed
        }
        dd($totalPay);
    }
}

