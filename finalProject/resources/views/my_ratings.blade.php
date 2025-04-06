<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-4">
        <h1 class="text-2xl font-semibold mb-6text-white">My Ratings</h1>

        {{-- Ratings Table --}}
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full rounded-lg shadow-md bg-gray-800">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">Movie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">Review</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-500">
                    @foreach ($ratingReviews as $rating)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                <a href="{{ route('movie_details', $rating->movie->id) }}" class="text-white hover:underline">{{ $rating->movie->title }} ({{ $rating->movie->release_date->format('Y') }})</a>
                            </td>

                            @if ($rating->rating === null)
                                <p class="text-gray-300">
                                    {{ $rating->rating ?? 'N/A' }}
                                </p>
                            @else
                                @php
                                    $userRating = $rating->rating;
                                    if (is_int($userRating) || floor($userRating) == $userRating) {
                                        $userRating = number_format($userRating, 1);
                                    }
                                @endphp

                                @if ($rating->rating >= 7.5)
                                    <td class="px-6 py-4 whitespace-nowrap text-green-500">{{ $userRating }}</td>
                                @elseif ($rating->rating >= 6.0)
                                    <td class="px-6 py-4 whitespace-nowrap text-yellow-500">{{ $userRating }}</td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap text-red-500">{{ $userRating }}</td>
                                @endif
                            @endif

                            <td class="px-6 py-4 whitespace-nowrap text-white text-wrap">{{ $rating->review }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">{{ $rating->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                <a href="{{ url('/movies/' . $rating->movie_id) }}" class="text-yellow-400 hover:underline">Edit</a>

                                <form action="{{ route('my_ratings.delete', $rating->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rating?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination Links --}}
        <div class="mt-4">
            {{ $ratingReviews->links() }}
        </div>

        {{-- No Ratings Message --}}
        @if($ratingReviews->isEmpty())
            <div class="mt-4">
                <p class="w-full text-white indent-8">You have not rated any movies yet. Don't be afraid to give bad reviews!</p>
            </div>
        @endif
    </div>
</x-app-layout>