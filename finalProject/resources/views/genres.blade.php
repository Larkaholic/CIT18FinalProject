<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-4">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Genres</h1>

        {{-- Genre List --}}
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($genres as $genreItem)
            <a href="{{ route('genres', ['genre' => $genreItem]) }}" class="px-3 py-1 border border-red-500 text-white bg-gray-800">
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
                            <h2 class="text-lg font-semibold mb-2 dark:text-white">{{ $movie->title }}  ({{ $movie->release_date ? $movie->release_date->format('Y') : 'N/A' }})</h2>
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
        
        {{-- Back to Top Button --}}
        <button id="backToTopBtn" class="fixed bottom-4 right-4 bg-gray-200 dark:bg-gray-700 rounded-full p-3 shadow-md cursor-pointer hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
        </button>
    </div>

    <script>
        // JavaScript for Back to Top Button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("backToTopBtn").classList.remove("hidden");
            } else {
                document.getElementById("backToTopBtn").classList.add("hidden");
            }
        }

        document.getElementById("backToTopBtn").addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</x-app-layout>