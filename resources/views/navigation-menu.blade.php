<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>

                    <!-- Accounts Button -->
                    <x-jet-nav-link href="{{ route('accounts') }}" :active="request()->routeIs('accounts')">
                        {{ __('Accounts') }}
                    </x-jet-nav-link>

                    <!-- Crypto Button -->
                    <x-jet-nav-link href="{{ route('crypto') }}" :active="request()->routeIs('crypto')">
                        {{ __('Crypto') }}
                    </x-jet-nav-link>

                    <!-- Currency Exchange Button -->
                    <x-jet-nav-link href="{{ route('currency-exchange') }}" :active="request()->routeIs('currency-exchange')">
                        {{ __('Currency Exchange') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <!-- Username Dropdown Button -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48" x-on:click.away="open = false">
                        <x-slot name="trigger">
                            @if (Auth::check())
                                <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <!-- Other dropdown items -->
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>
