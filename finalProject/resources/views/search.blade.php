<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results - MovieVault</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
    <header class="w-full p-6 lg:p-8">
        <nav>
            <div class="flex items-center gap-4 justify-center">
                <a href="{{ url('/home') }}" class="inline-block px-5 py-1.5 text-white hover:underline text-md leading-normal">Home</a>
            </div>
            <div class="flex items-center gap-4 justify-end">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-white  border border-white hover:border-red-700 rounded-md text-sm leading-normal">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 text-white bg-red-700 border border-red-700 hover:border-white rounded-md text-sm leading-normal">Register</a>
                        @endif
                    @endauth
            </div>
            @endif
        </nav>
    </header>
    <main class="flex-grow p-6 lg:p-8">
        {{-- Search Bar --}}
        <form action="{{ route('search') }}" method="get" class="relative z-10">
            <input
                type="text"
                name="query"
                placeholder="Search for movies..."
                class="text-sm md:text-md w-2/3 lg:w-full md:w-2/3 sm:w-2/3 md:p-4 rounded-md shadow-md focus:ring focus:ring-gray-900 dark:text-gray-800 dark:bg-gray-200"
            />
            <button type="submit" class="absolute right-4 top-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
        <br>
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Search Results for "{{ $query }}"</h1>
        @if ($movies->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($movies as $movie)
                <div class="flex border rounded-md p-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-1/6 mr-4">
                        <img src="{{ asset($movie->poster_path) }}" alt="{{ $movie->title }} Poster" class="w-full h-auto rounded-md">
                    </div>
                    <div class="w-5/6 ml-4">
                        <h2 class="text-lg font-semibold mb-2 dark:text-white">{{ $movie->title }}</h2>
                        <p class="text-sm dark:text-gray-300">{{ $movie->description }}</p>
                        <a href="{{ url('/movies/' . $movie->title) }}" class="mt-2 inline-block text-red-600 hover:underline">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="dark:text-white">No movies found.</p>
        @endif
    </main>
</body>
</html>