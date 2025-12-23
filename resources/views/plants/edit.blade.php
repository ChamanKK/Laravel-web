<x-layout title="Edit Plant">

    <div class="max-w-md mx-auto bg-[#C2DEC1] rounded-xl shadow-lg p-6 mt-10">

        <h1 class="text-2xl font-bold text-center text-[#295334] mb-6">
            Edit details for {{ $plant->name }}
        </h1>

        <form action="/plants/{{ $plant->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Name:</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $plant->name) }}"
                       class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Date Planted -->
            <div>
                <label for="date_planted" class="block text-gray-700 font-semibold mb-1">Date Planted:</label>
                <input type="date" id="date_planted" name="date_planted"
                       value="{{ old('date_planted', $plant->date_planted) }}"
                       class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]">
                @error('date_planted') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-1">Type:</label>
                <input type="text" id="type" name="type"
                       value="{{ old('type', $plant->type) }}"
                       class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]">
                @error('type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Watering Frequency -->
            <div>
                <label for="watering_frequency" class="block text-gray-700 font-semibold mb-1">Watering Frequency:</label>
                <input type="text" id="watering_frequency" name="watering_frequency"
                       value="{{ old('watering_frequency', $plant->watering_frequency) }}"
                       class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]">
                @error('watering_frequency') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-[#295334] text-white px-5 py-2 rounded-xl hover:bg-[#24533f] transition-colors duration-150 mt-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-layout>
