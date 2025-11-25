
<x-layout title="Edit a plant">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <h1>Edit the details for {{ $plant->name }}</h1>
    <form action="/plants" method="POST">
        @csrf
        @method('PATCH')

        <input type="hidden" name="id" value="{{ $plant->id }}">

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $plant->name }}">
        </div>

        <div>
            <label for="date_planted">Date Planted:</label>
            <input type="text" id="date_planted" name="date_planted" value="{{ $plant->date_planted }}">
        </div>

        <div>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" value="{{ $plant->type }}">
        </div>

        <div>
            <label for="watering_frequency">Watering Frequency:</label>
            <input type="text" id="watering_frequency" name="watering_frequency" value="{{ $plant->watering_frequency }}">
        </div>

        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>
</x-layout>
