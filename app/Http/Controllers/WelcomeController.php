<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders_count = Order::count();
        $vehicle_count = Vehicle::count();

        return view('welcome', ['orders_count' => $orders_count, 'vehicle_count' => $vehicle_count]);
    }
}
