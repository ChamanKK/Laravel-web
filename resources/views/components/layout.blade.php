<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    {{-- Logged in user --}}
    @auth
        <div>
            Logged in as {{ Auth::user()->name }}
            <form method="POST" action="/logout" style="display:inline-block;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    {{-- Navigation --}}
    <nav>
        <ul>
            <li><a href="/plants">Home</a></li>

            @auth
                @if(Auth::user()->role_id == 2)
                    <li><a href="/plants/create">Add a Plant</a></li>
                @endif
            @endauth

            <li><a href="/plants/about">About</a></li>

            @guest
                <li><a href="/login">Sign in</a></li>
            @endguest
        </ul>
    </nav>

    {{-- Search Form --}}
    <form action="/plants/search" method="GET">
        <input type="text" name="query" placeholder="Search plants...">
        <button type="submit">Search</button>
    </form>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Main Page Content --}}
    <div class="container">
        {{ $slot }}
    </div>

</body>
</html>
