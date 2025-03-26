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
        <nav class="flex items-center justify-end gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Home</a>
                    {{-- <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Dashboard</a> --}}
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-white  border border-white hover:border-red-700 rounded-md text-sm leading-normal">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 text-white bg-red-700 border border-red-700 hover:border-white rounded-md text-sm leading-normal">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>
    <main class="flex-grow p-6 lg:p-8">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Search Results for "{{ $query }}"</h1>
        @if ($movies->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($movies as $movie)
                    <div class="border rounded-md p-4 dark:border-gray-700 dark:bg-gray-800">
                        <h2 class="text-lg font-semibold mb-2 dark:text-white">{{ $movie->title }}</h2>
                        <p class="text-sm dark:text-gray-300">{{ $movie->description }}</p>
                        <a href="{{ url('/movies/' . $movie->id) }}" class="mt-2 inline-block text-blue-500 hover:underline">View Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="dark:text-white">No movies found.</p>
        @endif
    </main>
</body>
</html>