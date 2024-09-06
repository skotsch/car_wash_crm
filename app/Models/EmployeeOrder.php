<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOrder extends Model
{
    use HasFactory;

    protected $table = 'employee_order';

    protected $fillable = [
        'employee_id',
        'order_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
