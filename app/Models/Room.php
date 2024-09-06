<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
    ];

    public function hasOrders()
    {
        return $this->orders()->exists();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
