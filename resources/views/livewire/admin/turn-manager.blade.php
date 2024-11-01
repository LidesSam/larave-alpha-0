<div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900">{{ __('State') }}</h2>
        <p class="text-green-600">{{ $this->state}}</p>
    </div>
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900">{{ __('Email') }}</h2>
        <p class="text-green-600">{{ $this->email }}</p>
    </div>
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900">{{ __('Message') }}</h2>
        <p class="text-green-600">{{ $this->message }}</p>
    </div>
    <div class="mb-6">
        <label for="turnDate" class="block text-sm font-medium text-gray-700 mb-2">Select Turn Date</label>
        <div class="flex items-center space-x-4">
            <input type="date" id="turnDate" wire:model="turnDate" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <button wire:click="updateTurnDate" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Give a Turn
            </button>
        </div>
    </div>
    <button wire:click="rejectRequest" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
        Reject Request
    </button>
</div>
