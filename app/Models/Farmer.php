<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Farmer extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['name', 'email', 'pickpoint', 'phone', 'account', 'isValid'];

    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")->orWhere('email','like',"%{$value}%");
    }

    // Define the relationship with TeaSubmission model
    public function teaSubmissions()
    {
        return $this->hasMany(DailyTeaRecords::class);
    }

// Method to calculate total pay for the selected month
    public function calculateTotalPay($selectedMonth)
    {
        // Convert the selected month to a Carbon instance
        $selectedMonthDate = Carbon::parse($selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($selectedMonth)->endOfMonth();

        // Query tea submissions for the selected month
        $teaSubmissions = $this->teaSubmissions()
            ->whereBetween('date', [$selectedMonthDate, $endOfMonth])
            ->get();

        // Calculate total pay based on tea submissions
        $totalPay = $teaSubmissions->sum(function ($submission) {
            // Calculate payment for each submission (tea quantity * pay per kg)
            return $submission->tea_quantity * $submission->pay_per_kg;
        });

        return $totalPay;
    }
}

