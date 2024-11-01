<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Facades\Mail; // Import the Mail facade
class RequestForm extends Component
{
    public $email;
    public $message;

    protected $rules = [
        'email' => 'required|email',
        'message' => 'required|string|min:5',
    ];

    public function submit()
    {
        $this->validate();

        $hash = hash('sha256', Str::random(20) . microtime());
        Log::debug("hash: $hash"); // Fixed semicolon
        // Create a new request with the hash
        $request = Request::create([
            'email' => $this->email,
            'message' => $this->message,
            'state_id' => 1,
            'type_id' => 1,
            'hash' => $hash, // Ensure hash is included
            'turndate' => null,
        ]);
    
        // Send email
        return redirect()->route('request.show', ['id' => $request->id, 'hash' => $hash])
                     ->with('success', 'Request submitted successfully! Check your email for the status link.');
    }

    public function render()
    {
        return view('livewire.request-form');
    }
}

