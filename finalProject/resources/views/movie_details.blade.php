<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Movie Poster (Smaller) --}}
            <div class="md:col-span-1">
                <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="max-w-2/3 rounded-md shadow-md">
            </div>

            {{-- Movie Details --}}
            <div class="md:col-span-1">
                <h1 class="text-2xl font-semibold mb-4 text-white">{{ $movie->title }}</h1>

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
                    <h2 class="text-lg font-semibold text-white">Description</h2>
                    <p class="text-gray-300">{{ $movie->description }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-white">Release Date</h2>
                    <p class="text-gray-300">{{ $movie->release_date ? $movie->release_date->format('F j, Y') : 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-white">Genre</h2>
                    <p class="text-gray-300">{{ $movie->genre }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-white">Director</h2>
                    <p class="text-gray-300">{{ $movie->director ?? 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-white">Cast</h2>
                    <p class="text-gray-300">{{ $movie->cast ?? 'N/A' }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-white">Average Rating</h2>

                    @if ($movie->average_rating === null)
                        <p class="text-gray-300">
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
                            <p class="text-green-500">
                                {{ $rating }}
                            </p>
                        @elseif ($movie->average_rating >= 6.0)
                            <p class="text-yellow-500">
                                {{ $rating }}
                            </p>
                        @else
                            <p class="text-red-500">
                                {{ $rating }}
                            </p>
                        @endif
                    @endif
                </div>

                {{-- Rating Form --}}
                <form id="ratingForm" class="flex flex-col gap-2" action="{{ route('rate', $movie->id) }}" method="POST">
                    @csrf
                    @if ($userRating)
                        <label for="rating" class="text-white">My Rating (1 - 10)</label>
                        <input type="number" name="rating" id="rating" min="1" max="10" class="p-2 border rounded-md bg-gray-800 border-gray-700 text-white" value="{{ $userRating->rating }}">
                        <label for="review" class="text-white">My Review (Optional)</label>
                        <textarea name="review" id="review" class="p-2 border rounded-md bg-gray-800 border-gray-700 text-white">{{ $userRating->review }}</textarea>
                        <button type="submit" class="p-2 border border-yellow-500 hover:bg-yellow-600 transition text-yellow-500 hover:text-white rounded-md">Edit Movie Rating</button>
                    @else
                        <label for="rating" class="text-white">My Rating (1 - 10)</label>
                        <input type="number" name="rating" id="rating" min="1" max="10" class="p-2 border rounded-md bg-gray-800 border-gray-700 text-white">
                        <label for="review" class="text-white">My Review (Optional)</label>
                        <textarea name="review" id="review" class="p-2 border rounded-md bg-gray-800 border-gray-700 text-white"></textarea>
                        <button type="submit" class="p-2 bg-yellow-500 hover:bg-yellow-400 text-black rounded-md">Rate Movie</button>
                    @endif
                </form>
            </div>
        </div>
    
        {{-- Others' Ratings --}}
        <div>
            <h2 class="text-2xl font-semibold mt-16 mb-4 text-white">What Others Think</h2>
            @if ($otherRatings->isNotEmpty())
                <ul class="space-y-6">
                    @foreach ($otherRatings as $rating)
                        <li class="bg-gray-800 p-4 rounded-md">
                            <div class="flex items-center mb-2">
                                <span class="font-semibold text-white">{{ $rating->user->name }}</span>
                                <span class="text-gray-400 ml-2">rated it:
                                    @php
                                        $rating_double = $rating->rating;
                                        if (is_int($rating_double) || floor($rating_double) == $rating_double) {
                                            $rating_double = number_format($rating_double, 1);
                                        }
                                    @endphp

                                    @if ($rating->rating >= 7.5)
                                        <span class="text-green-500">{{ $rating_double }}</span>
                                    @elseif ($rating->rating >= 6.0)
                                        <span class="text-yellow-500">{{ $rating_double }}</span>
                                    @else
                                        <span class="text-red-500">{{ $rating_double }}</span>
                                    @endif
                                    /10
                                </span>
                            </div>
                            @if ($rating->review)
                                <p class="text-gray-300">{{ $rating->review }}</p>
                            @else
                                <p class="text-gray-500 italic">No review provided.</p>
                            @endif
                            <small class="text-gray-400 mt-2 block">Reviewed on {{ $rating->created_at->format('F j, Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No other reviews yet for this movie.</p>
            @endif
        </div>

        {{-- Pagination Links --}}
        <div class="mt-4">
            {{ $otherRatings->links() }}
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