<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'last_name', 'first_name', 'patronymic', 'phone', 'email', 'position',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'employee_order');
    }
}
