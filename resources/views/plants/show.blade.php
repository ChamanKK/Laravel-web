<x-layout title="Show the details for a Plant">
    <h1>{{$plant->name}}</h1>
    <p>Date Planted: {{$plant->date_planted}}</p>
    <p>Type: {{$plant->type}}</p>
    <p>Watering Frequency: {{$plant->watering_frequency}}</p>


    <a href='/plants/{{$plant->id}}/edit'>
       <button type="submit" class="edit-button">Edit</button>
    </a>

    <form method='POST' action='/plants'>
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$plant->id}}">
        <button type='submit'>Delete</button>
    </form>
</x-layout>