<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-10">
        <h1 class="text-2xl font-semibold mb-6 dark:text-white">My Watchlist</h1>

        {{-- Watchlisted Movies --}}
        <h2 class="text-xl font-semibold mt-8 mb-4 dark:text-white">Watchlisted Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if ($favoriteMovies->isNotEmpty())
                @foreach ($watchlistedMovies as $movie)
                <div class="flex-shrink-0 w-48">
                    <a href="{{ url('/movies/' . $movie->id) }}">
                        <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-64 object-cover rounded-md mb-2">
                        <h3 class="text-sm font-semibold dark:text-white">{{ $movie->title }} ({{ $movie->release_date ? $movie->release_date->format('Y') : 'N/A' }})</h3>
                    </a>
                </div>
                @endforeach
            @else
                <div class="col-span-full">
                    <p class="w-full dark:text-white indent-8">Watchlist still empty. Add some to-watch movies to fill it up!</p>
                </div>
            @endif    
        </div>
    </div>
</x-app-layout>