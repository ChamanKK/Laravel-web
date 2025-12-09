<x-layout title="Show the details for a Plant">
    <h1>{{$plant->name}}</h1>
    <p>Date Planted: {{$plant->date_planted}}</p>
    <p>Type: {{$plant->type}}</p>
    <p>Watering Frequency: {{$plant->watering_frequency}}</p>

    @can('edit')
    <a href="/plants/{{$plant->id}}/edit">
        <button type="button" class="edit-button">Edit</button>
    </a>

    <form method="POST" action="/plants/{{$plant->id}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    @endcan

</x-layout>
