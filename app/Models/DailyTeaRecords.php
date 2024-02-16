<?php

namespace App\Models;

use App\Models\Farmer;
use App\Models\Payrolls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTeaRecords extends Model
{
protected $fillable = ['supply_date', 'farmer_name', 'tea_quantity', 'farmer_id'];

    public function farmer()
{
    return $this->belongsTo(Farmer::class);
}
    public function scopeSearch($query, $value)
    {
        $query->where('farmer_name', 'like', "%{$value}%")->orWhere('farmer_id', 'like', "%{$value}%");
    }
    public function payroll()
    {
        return $this->belongsTo(Payrolls::class);
    }
}
