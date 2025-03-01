<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Article;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Articles = Article::take(3)->get();
        $Orders = Order::all()->count();
        $Vehicles = Vehicle::take(10)
            ->with('priceList')
            ->with('piers')
            ->with('categories')
            ->with('availableOption')
            ->get();

        return view('welcome', ['Articles' => $Articles, 'Orders' => $Orders, 'Vehicles' => $Vehicles]);
    }
}
