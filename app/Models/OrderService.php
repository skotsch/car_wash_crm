<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderService extends Pivot
{
    protected $table = 'order_service';

    protected $fillable = [
        'order_id',
        'service_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
