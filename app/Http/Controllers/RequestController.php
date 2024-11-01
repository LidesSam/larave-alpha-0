<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Redirect;

class RequestController extends Controller
{
    public function show($id, $hash)
    {
        // Find the request by ID
        $request = RequestModel::find($id);

        // Check if the request exists and the hash matches
        if ($request && hash_equals($request->hash, $hash)) {
            // Get the state
            $state = $request->state->def_es;  // Assuming state is a relationship

            // Return the view with the request and state
            return view('webfront.request-state', [
                'request' => $request,
                'state' => ucfirst($state)  // Pass state as a string
            ]);
        } else {
            // Handle invalid request or hash
            return Redirect::route('home')->withErrors('Invalid request or hash.');
        }
    }

    public function cancel($id, $hash)
    {
        $request = RequestModel::find($id);

        // Validate the request and hash
        if ($request && hash_equals($request->hash, $hash) && $request->state->def_es === 'pending') {
            // Update the state to cancelled
            $request->state_id = 3; // Assuming 3 is the ID for 'cancelled' in request_state
            $request->save();

            // Redirect to the request status page with a success message
            return Redirect::route('request.show', ['id' => $id, 'hash' => $hash])
                ->with('status', 'Request has been cancelled successfully.');
        }

        // Redirect back to the request status page with an error message
        return Redirect::route('request.show', ['id' => $id, 'hash' => $hash])
            ->withErrors('Unable to cancel the request.');
    }
}
