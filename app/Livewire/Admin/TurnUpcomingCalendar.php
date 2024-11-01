<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Request;

class TurnUpcomingCalendar extends Component
{
    public $turnRequests;

    public function mount()
    {
        // Fetch all requests of type "turn"
         $this->turnRequests = Request::where('type_id', 1)
         ->orderBy("turndate")// Assuming type_id 1 corresponds to "turn"
         ->get();
    }

    public function render()
    {
        return view('livewire.admin.turn-upcoming-calendar', [
            'turnRequests' => $this->turnRequests
        ]);
    }
}
