<?php

namespace App\Models;

use App\Models\Farmer;
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
        $query->where('name', 'like', "%{$value}%")->orWhere('description', 'like', "%{$value}%");
    }
}
