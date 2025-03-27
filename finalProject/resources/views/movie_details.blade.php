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

                {{-- Favorite Button --}}
                <form action="{{ route('favorite', $movie->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center p-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                        @if ($isFavorite)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            Remove from Favorites
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            Add to Favorites
                        @endif
                    </button>
                </form>

                <div class="mb-4 mt-4">
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
                    @else
                        @php
                            $rating = $movie->average_rating;
                            if (is_int($rating) || floor($rating) == $rating) {
                                $rating = number_format($rating, 1);
                            }
                        @endphp

                        @if ($movie->average_rating >= 7.5)
                            <p class="dark:text-green-500">
                                {{ $rating }}
                            </p>
                        @elseif ($movie->average_rating >= 6.0)
                            <p class="dark:text-yellow-500">
                                {{ $rating }}
                            </p>
                        @else
                            <p class="dark:text-red-500">
                                {{ $rating }}
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>