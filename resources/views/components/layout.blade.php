<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Plant App' }}</title>
    @vite(['resources/css/app.css'])
</head>

<body  class=" flex flex-col min-h-screen bg-cover bg-center bg-no-repeat bg-fixed"
       style="background-image: url('{{ asset('images/houseplants.jpg') }}');">
       
    {{-- Header / Navbar --}}
    <header class="bg-transparent text-[#16312B] h-16 flex items-center flex-shrink-0 backdrop-blur-sm">
        <div class="container mx-auto flex justify-between items-center px-8">
            <!-- Logo slightly to the right -->
            <a href="/plants" class="flex items-center space-x-2 ml-20">
                <img src="{{ asset('images/Garden.png') }}" alt="Logo" 
                    class="h-30 md:h-30 lg:h-20 object-contain pointer-events-none mt-5">
            </a>

            <!-- Nav links slightly to the left -->
            <nav class="mr-10">
                <ul class="flex space-x-6 items-center">
                    <li><a href="/plants" class="hover:text-[#7EB182]">Home</a></li>

                    @auth
                        @if(Auth::user()->role_id == 2)
                            <li><a href="/plants/create" class="hover:text-[#7EB182]">Add a Plant</a></li>
                        @endif
                        <li>
                            <form method="POST" action="/logout" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-[#7EB182]">Logout ({{ Auth::user()->name }})</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li><a href="/login" class="hover:text-[#7EB182]">Sign in</a></li>
                    @endguest

                    <li><a href="/plants/about" class="hover:text-[#7EB182]">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- Search Form --}}
    <div class="container mx-auto px-4 py-2 flex justify-center flex-shrink-0 mt-3">
        <form action="/plants/search" method="GET" class="flex gap-2 w-full max-w-4xl">
            <input type="text" name="query" placeholder="Search plants..."
                   class="flex-1 border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]">
            <button type="submit"
                    class="bg-[#16312B] text-white px-5 py-2 rounded hover:bg-[#24533f]">
                Search
            </button>
        </form>
    </div>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="container mx-auto px-4 py-2 bg-red-100 text-red-700 rounded mb-2 flex-shrink-0">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Main Content --}}
    <main class="flex-1 container mx-auto px-4 py-2 overflow-hidden">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-transparent text-[#16312B] h-12 flex items-center justify-center flex-shrink-0">
        &copy; {{ date('Y') }} GardenLog. All rights reserved.
    </footer>

</body>

</html>
