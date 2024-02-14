<?php

namespace App\Models;

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
    }}

