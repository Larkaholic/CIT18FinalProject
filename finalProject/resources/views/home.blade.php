<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Search Bar --}}
        <form action="{{ route('search') }}" method="get" class="relative z-10">
            <input
                type="text"
                name="query"
                placeholder="Search for movies..."
                class="text-sm md:text-md w-2/3 lg:w-full md:w-2/3 sm:w-2/3 md:p-4 rounded-md shadow-md focus:ring focus:ring-gray-900 dark:text-gray-800 dark:bg-gray-200"
            />
            <button type="submit" class="absolute right-4 top-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
        <br>

        {{-- Popular Movies Section --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4 dark:text-white">Popular Movies</h2>
            <div class="flex overflow-x-auto gap-4">
                @foreach ($popularMovies as $movie)
                    <div class="flex-shrink-0 w-48">
                        <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-64 object-cover rounded-md mb-2">
                        <h3 class="text-sm font-semibold dark:text-white">{{ $movie->title }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Newly Added Movies Section --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4 dark:text-white">Newly Added Movies</h2>
            <div class="flex overflow-x-auto gap-4">
                @foreach ($newMovies as $movie)
                    <div class="flex-shrink-0 w-48">
                        <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-64 object-cover rounded-md mb-2">
                        <h3 class="text-sm font-semibold dark:text-white">{{ $movie->title }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Movies by Genre Sections --}}
        @foreach ($genres as $genre)
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-4 dark:text-white">{{ $genre }} Movies</h2>
                <div class="flex overflow-x-auto gap-4">
                    @foreach ($genreMovies[$genre] as $movie)
                        <div class="flex-shrink-0 w-48">
                            <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-64 object-cover rounded-md mb-2">
                            <h3 class="text-sm font-semibold dark:text-white">{{ $movie->title }}</h3>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
        </div>
</x-app-layout>