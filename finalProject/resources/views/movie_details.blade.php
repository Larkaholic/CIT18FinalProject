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

                {{-- User Interactions --}}
                <div class="mt-4 flex gap-4">
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

                    {{-- Watchlist Button --}}
                    <form action="{{ route('watchlist', $movie->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center p-2 text-white hover:text-red-500 rounded-md">
                            @if ($isWatchlist)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="red">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                In Watchlist
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Add to Watchlist
                            @endif
                        </button>
                    </form>
                </div>

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

                {{-- Rating Form --}}
                <form id="ratingForm" class="flex flex-col gap-2" action="{{ route('rate', $movie->id) }}" method="POST">
                    @csrf
                    @if ($userRating)
                        <label for="rating" class="dark:text-white">My Rating (1 - 10)</label>
                        <input type="number" name="rating" id="rating" min="1" max="10" class="p-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-white" value="{{ $userRating->rating }}">
                        <label for="review" class="dark:text-white">My Review (Optional)</label>
                        <textarea name="review" id="review" class="p-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-white">{{ $userRating->review }}</textarea>
                        <button type="submit" class="p-2 border border-yellow-500 hover:bg-yellow-600 transition text-yellow-500 hover:text-white rounded-md">Edit Movie Rating</button>
                    @else
                        <label for="rating" class="dark:text-white">My Rating (1 - 10)</label>
                        <input type="number" name="rating" id="rating" min="1" max="10" class="p-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <label for="review" class="dark:text-white">My Review (Optional)</label>
                        <textarea name="review" id="review" class="p-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-white"></textarea>
                        <button type="submit" class="p-2 bg-yellow-500 hover:bg-yellow-400 text-black rounded-md">Rate Movie</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-app-layout>