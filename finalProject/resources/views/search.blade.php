<x-app-layout>
    <div class="flex-grow p-6 lg:p-8 -mt-10">
        {{-- Search Bar --}}
        <form action="{{ route('search') }}" method="get" class="relative z-10">
            <input
                type="text"
                name="query"
                placeholder="Search for movies..."
                class="text-sm md:text-lg w-full p-3 rounded-md shadow-md focus:ring focus:ring-gray-900 dark:text-gray-800 dark:bg-gray-200"
            />
            <button type="submit" class="absolute right-4 top-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
        <br>
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Search Results for "{{ $query }}"</h1>
        
        {{-- Search Results --}}
        @if ($movies->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($movies as $movie)
                <div class="flex border rounded-md p-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-1/4 mr-4">
                        <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-auto rounded-md">
                    </div>
                    <div class="w-3/4 ml-4">
                        <h2 class="text-lg font-semibold mb-2 dark:text-white">{{ $movie->title }}</h2>
                        <p class="text-sm dark:text-gray-300">{{ $movie->description }}</p>
                        <a href="{{ url('/movies/' . $movie->id) }}" class="mt-2 inline-block text-red-600 hover:underline">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="dark:text-white">No movies found.</p>
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