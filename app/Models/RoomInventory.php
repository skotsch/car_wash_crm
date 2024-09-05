<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomInventory extends Model
{
    protected $table = 'room_inventory';

    protected $fillable = [
        'room_id', 'inventory_id', 'quantity',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
