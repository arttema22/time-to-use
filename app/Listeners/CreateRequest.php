<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Request;
use App\Models\Vehicle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateRequest
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $vehicles = Vehicle::where('flag_activity', 1)
            ->get();

        foreach ($vehicles as $vehicle) {
            Request::create([
                'order_id' => $event->order->id,
                'owner_id' => 1,
                'request_date_from' => $event->order->date_time_order,
                'request_date_to' => $event->order->date_time_order,
            ]);
        };
    }
}
