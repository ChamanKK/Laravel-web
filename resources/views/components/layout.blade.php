<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="/plants">Home</a></li>
        <li><a href="/plants/create">Add new Plant</a></li>
        <li><a href="/plants/about">About</a></li>
      </ul>
    </nav>

    
    <form action="/plants/search" method="GET">
        <input type="text" name="query" placeholder="Search plants...">
        <button type="submit">Search</button>
    </form> 

    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
      {{ $slot }}
    </div>
    
  </body>
</html>