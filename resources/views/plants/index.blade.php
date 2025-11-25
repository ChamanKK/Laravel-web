<!DOCTYPE HTML>
<html>
<head>
<title>List the Plants</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
</head>
<body>

<x-layout title="List the Plants">
    <h1>Plants in my Garden</h1>
    
    @foreach ($plants as $plant)
    <div class="plant-card">
        <h3>
            <a href="/plants/{{ $plant->id }}">
                <h2>{{ $plant->name }}</h2>
            </a>
        </h3>
        <p>Type: {{ $plant->type }}</p>
    </div>
    @endforeach

</x-layout>


</body>
</html>