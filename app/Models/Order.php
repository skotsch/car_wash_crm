<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'order_time', 'client_id', 'room_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_service');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_order');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
