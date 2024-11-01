<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RequestController; // Import the controller
Route::get('/', function () {
    return view('home');
});

Route::get('/request/{id}', function () {
    return view('webfront.request-state');
});

Route::get('/request', function () {
    return view('webfront.request');
});



/**webfront */
Route::get('/request/{id}/{hash}', [RequestController::class, 'show'])->name('request.show');
/*client cancelation of request endpoint */
Route::post('/request/{id}/{hash}/cancel', [RequestController::class, 'cancel'])->name('request.cancel');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');
    

    // Admin list of requested turns
    Route::get('/requests', function () {
        return view('admin.requests'); // Ensure you have a corresponding Blade view file
    })->name('admin.request');

    // Admin list of requested turns
    Route::get('/requests/{id}', function ($id) {
        // Fetch the request by $id from the database or another source
        $request = \App\Models\Request::findOrFail($id); // Assuming you have a Request model

        return view('admin.requests.manage', compact('request')); // Ensure you have a corresponding Blade view file
    })->name('admin.requests.manage');
    
});
