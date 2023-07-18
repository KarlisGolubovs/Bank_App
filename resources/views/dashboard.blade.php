<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-4">Welcome, {{ $user->name ?? 'Guest' }}</h2>

                    <!-- Add the button to navigate to the user's profile -->
                    <a href="{{ route('profile.show') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link href="{{ mix('css/app.css') }}" rel="stylesheet">
