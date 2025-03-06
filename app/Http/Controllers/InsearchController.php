<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class InsearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function search(Request $request)
    {
        $vehicles = Vehicle::where('flag_activity', 1)
            ->where('qnty_places', '>=', $request->qnty_places)
            ->get();


        // dd($request->all());

        // $request->validate([
        //     'date' => 'required|date|before_or_equal:today',
        //     'time' => 'required',
        // ]);

        // dd($request->all());

        // $Datetime = $request->date . ' ' . $request->time;

        // dd($Datetime);

        // Order::create([
        //     'flag_activity' => 1,
        //     'date_time_order' => $Datetime,
        // ]);



        return view('insearch', ['vehicles' => $vehicles]);
    }
}
