<x-app-layout>
    <x-slot name="header">
        <x-admin-nav />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>Home</div>
                <livewire:admin.turn-upcoming-calendar>
            </div>
        </div>
    </div>
</x-app-layout>