<!DOCTYPE HTML>
<html>
<head>
    <title>List the Plants</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>

    <x-layout title="List the Plants">

        <h1>Plants in my Garden</h1>

        @auth
            @foreach ($plants as $plant)
                <div class="plant-card">
                    <h2>
                        <a href="/plants/{{ $plant->id }}">
                            {{ $plant->name }}
                        </a>
                    </h2>
                    <p>Type: {{ $plant->type }}</p>
                </div>
            @endforeach
        @endauth

        @guest
            <p>
                You need to be logged in to view the content of this website.
             @endguest
            </p>
        

    </x-layout>

</body>
</html>
