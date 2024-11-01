<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Request as RequestModel;

class RequestsTable extends Component
{
    use WithPagination;

    public function render()
    {
        // Apply paginate directly on the query builder
        $requests = RequestModel::with(['state', 'type'])->paginate(10); // Adjust the pagination size as needed

        return view('livewire.admin.requests-table', ['requests' => $requests]);
    }
}
