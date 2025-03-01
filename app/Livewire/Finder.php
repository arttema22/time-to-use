<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Response;
use App\Models\Vehicle;
use Livewire\Component;

class Finder extends Component
{
    public function render()
    {
        $orders_count = Order::count();
        $vehicle_count = Vehicle::count();
        $responses = Response::all();

        return view('livewire.finder', ['orders_count' => $orders_count, 'vehicle_count' => $vehicle_count, 'responses' => $responses]);
    }
}
