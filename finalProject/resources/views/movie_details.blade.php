<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Movie Poster (Smaller) --}}
            <div class="md:col-span-1">
                <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="max-w-2/3 rounded-md shadow-md">
            </div>

            {{-- Movie Details --}}
            <div class="md:col-span-1">
                <h1 class="text-2xl font-semibold mb-4 dark:text-white">{{ $movie->title }}</h1>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Description</h2>
                    <p class="dark:text-gray-300">{{ $movie->description }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Release Date</h2>
                    <p class="dark:text-gray-300">{{ $movie->release_date ? $movie->release_date->format('F j, Y') : 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Genre</h2>
                    <p class="dark:text-gray-300">{{ $movie->genre }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Director</h2>
                    <p class="dark:text-gray-300">{{ $movie->director ?? 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Cast</h2>
                    <p class="dark:text-gray-300">{{ $movie->cast ?? 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">Average Rating</h2>

                    @if ($movie->average_rating === null)
                        <p class="dark:text-gray-300">
                            {{ $movie->average_rating ?? 'N/A' }}
                        </p>
                    @elseif ($movie->average_rating >= 7.5)
                        <p class="dark:text-green-500">
                            {{ $movie->average_rating ?? 'N/A' }}
                        </p>
                    @elseif ($movie->average_rating >= 6.0)
                        <p class="dark:text-yellow-500">
                            {{ $movie->average_rating ?? 'N/A' }}
                        </p>
                    @else
                        <p class="dark:text-red-500">
                            {{ $movie->average_rating ?? 'N/A' }}
                        </p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>