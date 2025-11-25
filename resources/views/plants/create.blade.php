<x-layout title="Add new Plant">
  <h1>Add a new Plant</h1>

 <form action="/plants" method="POST">
    @csrf

    <div>
        <label for="name">Plant Name:</label>
        <input type="text" id="name" name="name" required />
    </div>

    <div>
        <label for="date_planted">Date Planted:</label>
        <input type="date" id="date_planted" name="date_planted" />
    </div>

    <div>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required />
    </div>

    <div>
        <label for="watering_frequency">Watering Frequency (days):</label>
        <input type="text" id="watering_frequency" name="watering_frequency" />
    </div>

    <div>
        <button type="submit">Save the Plant</button>
    </div>
</form>

</x-layout>