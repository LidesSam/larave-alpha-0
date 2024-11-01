<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center justify-center w-full h-full py-12 bg-gray-100">
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">
                Ariana Arrieta Nutricionista
            </h1>
            <p class="text-lg mb-6 text-gray-600">
                {{ __('Consultation and Personal Diet') }}
            </p>
            <div class="text-center">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">
                    {{ __('Press to request an appointment') }}
                </h2>
                <a href="/request">
                    <button class="bg-blue-500 text-white rounded-lg px-6 py-3 text-lg font-semibold hover:bg-blue-600 transition duration-300">
                        {{ __('Get an Appointment') }} <i class="fas fa-calendar-check ml-2"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
