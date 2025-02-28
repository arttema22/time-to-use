<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class Finder extends Component
{
    public function render()
    {
        $vehicle_count = Vehicle::count();
        return view('livewire.finder', ['vehicle_count' => $vehicle_count]);
    }
}
