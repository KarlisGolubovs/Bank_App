<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-lg mb-4">This is your personal dashboard.</p>

                <!-- Add the view of user accounts -->
                <h2 class="text-xl font-semibold mb-2">Your Accounts:</h2>
                <ul>
                    @foreach ($user->accounts as $account)
                        <li>{{ $account->name }}</li>
                    @endforeach
                </ul>

                <p class="text-lg mb-4">You can customize this page to display your desired information and features.</p>
                <p class="text-lg">Feel free to explore and make it your own.</p>
            </div>
        </div>
    </div>
</x-app-layout>
