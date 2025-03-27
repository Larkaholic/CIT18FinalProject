<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 -mt-4">
        <h1 class="text-2xl font-semibold mb-6 dark:text-white">My Ratings</h1>

        {{-- Ratings Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md dark:bg-gray-800">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Movie Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Review</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($ratingReviews as $rating)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                <a href="{{ route('movie_details', $rating->movie->id) }}" class="text-red-500 hover:underline">{{ $rating->movie->title }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white">{{ $rating->rating }}</td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white">{{ $rating->review }}</td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white">{{ $rating->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($ratingReviews->isEmpty())
            <div class="mt-4">
                <p class="w-full dark:text-white indent-8">You have not rated any movies yet. Don't be afraid to give bad reviews!</p>
            </div>
        @endif
    </div>
</x-app-layout>