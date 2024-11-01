<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Request;

class TurnManager extends Component
{
    public $requestId;
    
    public $email;
    public $message;
    public $state;
    public $turnDate;

    public function mount($requestId)
    {
        $this->requestId = $requestId;
        $request = Request::findOrFail($requestId);
        $this->turnDate = $request->turndate;
        $this->message =$request->message;
        $this->email =$request->email;
        $this->state =$request->state_id;
    }

    public function updateTurnDate()
    {
        $request = Request::findOrFail($this->requestId);
        $request->turndate = $this->turnDate;
        $request->state_id = 2;
        $request->save();

        session()->flash('message', 'Turn date updated successfully.');
    }

    public function rejectRequest()
    {
        $request = Request::findOrFail($this->requestId);
        $request->state_id = 4;
        $request->save();

        session()->flash('message', 'Turn date updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.turn-manager');
    }
}
