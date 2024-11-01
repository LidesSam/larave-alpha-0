<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-200 to-purple-300 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-4">
                        {{ __('Request') . ' #' . $request->id }}
                    </h3>
                    <p class="text-lg mb-4">
                        {{ __('We are processing your request')}}. {{__('A notification will be sent to your email when this process is complete.') }}
                    </p>
                    <p class="text-lg mb-4">
                        {{ __('Current State') . ': ' . $state }}
                    </p>

                    @if($state === 'Pending')
                        <form action="{{ route('request.cancel', [$request->id, $request->hash]) }}" method="POST">
                            @csrf
                            <x-danger-button type="submit" class="space-x-2 flex flex-grotw">
                                <div>{{ __('Cancel Turn') }}</div><i class="fas fa-calendar-check"></i>
                            </x-danger-button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
