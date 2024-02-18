<?php

namespace App\Models;

use App\Livewire\PayslipGenerator;
use App\Models\Farmer;
use App\Models\Payrolls;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTeaRecords extends Model
{
protected $fillable = ['supply_date', 'farmer_name', 'tea_quantity', 'farmer_id', 'pay_per_kg'];

    public function farmer()
{
    return $this->belongsTo(Farmer::class);
}
    public function scopeSearch($query, $value)
    {
        $query->where('farmer_name', 'like', "%{$value}%")->orWhere('farmer_id', 'like', "%{$value}%");
    }
    /* public function payroll()
    {
        return $this->belongsTo(PayslipGenerator::class);
    } */
    public function teaSubmissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DailyTeaRecords::class, 'farmer_id');
    }

    public function calculateTotalPay($selectedMonth)
    {
        // Convert the selected month to a Carbon instance
        $selectedMonthDate = Carbon::parse($selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($selectedMonth)->endOfMonth();

        // Query tea submissions for the selected month
        $teaSubmissions = $this->teaSubmissions()
            ->whereBetween('supply_date', [$selectedMonthDate, $endOfMonth])
            ->get();

        // Calculate total pay based on tea submissions
        $totalPay = $teaSubmissions->sum(function ($submission) {
            // Calculate payment for each submission (tea quantity * pay per kg)
            return $submission->tea_quantity * $submission->pay_per_kg;
        });

        return $totalPay;
    }

}
