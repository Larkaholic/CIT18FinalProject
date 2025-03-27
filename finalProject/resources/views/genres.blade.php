<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-4">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Genres</h1>

        {{-- Genre List --}}
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($genres as $genreItem)
                <a href="{{ route('genres', ['genre' => $genreItem]) }}" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded-full text-sm dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                    {{ $genreItem }}
                </a>
            @endforeach
        </div>
        <br>

        {{-- Movies by Genre --}}
        @if (isset($genre))
            <h2 class="text-xl font-semibold mb-4 dark:text-white">Movies in {{ $genre }} Genre</h2>
            @if (isset($movies) && $movies->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($movies as $movie)
                        <div class="border rounded-md p-4 dark:border-gray-700 dark:bg-gray-800">
                            <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-48 object-cover mb-2 rounded-md">
                            <h2 class="text-lg font-semibold mb-2 dark:text-white">{{ $movie->title }}</h2>
                            <p class="text-sm dark:text-gray-300">{{ $movie->description }}</p>
                            <a href="{{ url('/movies/' . $movie->id) }}" class="mt-2 inline-block text-blue-500 hover:underline">View Details</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="dark:text-white">No movies found in {{ $genre }} genre.</p>
            @endif
        @else
            <p class="dark:text-white">Select a genre to view movies.</p>
        @endif
</x-app-layout>