<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-4">
        <h1 class="text-2xl font-semibold mb-6 text-white">My Favorites</h1>

        {{-- Favorite Movies --}}
        {{-- <h2 class="text-xl font-semibold mb-4 text-white">Favorite Movies</h2> --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if ($favoriteMovies->isNotEmpty())
                @foreach ($favoriteMovies as $movie)
                    <div class="flex-shrink-0 w-48">
                        <a href="{{ url('/movies/' . $movie->id) }}">
                            <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-64 object-cover rounded-md mb-2">
                            <h3 class="text-sm font-semibold text-white">{{ $movie->title }} ({{ $movie->release_date ? $movie->release_date->format('Y') : 'N/A' }})</h3>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-span-full">
                    <p class="text-white indent-8">You still haven't favorited any movie. Better watch something soon!</p>
                </div>
            @endif
        </div>

        {{-- Back to Top Button --}}
        <button id="backToTopBtn" class="fixed bottom-4 right-4 bg-gray-700 rounded-full p-3 shadow-md cursor-pointer hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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