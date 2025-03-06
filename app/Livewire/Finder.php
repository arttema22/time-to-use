<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\Category;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;

class Finder extends Component
{
    public $date = '', $cat_id = '', $qnty_places = 0;
    public $qnty_siutes = 0, $qnty_toilets = 0,
        $flag_shower = 0, $flag_fridge = 0, $flag_kitchen = 0,
        $flag_audio = 0, $flag_tv = 0, $flag_open_deck = 0,
        $flag_flybridge = 0;

    public $registerForm = false;
    public $authForm = true;
    public $userModal = false;

    public function render()
    {
        $this->resetInputFields();
        $orders_count = Order::count();
        $vehicle_count = Vehicle::count();
        $categories = Category::where('flag_activity', 1)->get();
        $responses = Response::all();

        return view('livewire.finder', [
            'orders_count' => $orders_count,
            'vehicle_count' => $vehicle_count,
            'categories' => $categories,
            'responses' => $responses
        ]);
    }

    public function toggleUserForm()
    {
        $this->authForm = !$this->authForm;
        $this->registerForm = !$this->registerForm;
    }
    public function toggleUserModal()
    {
        $this->userModal = !$this->userModal;
    }

    public function edit()
    {
        //    $this->authForm = true;
    }

    public function store()
    {
        if (Auth::user()) {
            //  dd($this);
            $this->validate([
                'date' => 'required|date|after_or_equal:today', //не включено в поиск
                'cat_id' => 'required', //не включено в поиск
                'qnty_places' => 'required|numeric',
                'qnty_siutes' => 'numeric',
                'qnty_toilets' => 'numeric',
                'flag_shower' => 'boolean',
                'flag_fridge' => 'boolean',
                'flag_kitchen' => 'boolean',
                'flag_audio' => 'boolean',
                'flag_tv' => 'boolean',
                'flag_open_deck' => 'boolean',
                'flag_flybridge' => 'boolean'
            ]);

            $vehicles = Vehicle::where('flag_activity', 1)
                //  ->where('cat_id', '>=', $this->cat_id)
                ->where('qnty_places', '>=', $this->qnty_places)
                ->where('qnty_siutes', '>=', $this->qnty_siutes)
                ->where('qnty_toilets', '>=', $this->qnty_toilets)
                ->where('flag_shower', '=', $this->flag_shower)
                ->where('flag_fridge', '=', $this->flag_fridge)
                ->where('flag_kitchen', '=', $this->flag_kitchen)
                ->where('flag_audio', '=', $this->flag_audio)
                ->where('flag_tv', '=', $this->flag_tv)
                ->where('flag_open_deck', '=', $this->flag_open_deck)
                ->where('flag_flybridge', '=', $this->flag_flybridge)
                ->get();

            dd($vehicles);
        } else {
            $this->toggleUserModal();
            return;
            // dd('NO');
        }





        //dd($this->date);
    }

    private function resetInputFields()
    {
        $this->date = date('Y-m-d h:i');
        $this->cat_id = 0;
        $this->qnty_places = 1;
        $this->qnty_siutes = 0;
        $this->qnty_toilets = 0;
        $this->flag_shower = 0;
        $this->flag_fridge = 0;
        $this->flag_kitchen = 0;
        $this->flag_audio = 0;
        $this->flag_tv = 0;
        $this->flag_open_deck = 0;
        $this->flag_flybridge = 0;
    }
}
