<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <p>Welcome to MovieVault, {{ auth()->user()->name }}!</p>
                    <br>
                    <p>Thank you for joining our MovieVault Community! Our website is currently in development. Check back later!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
