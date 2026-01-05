<x-layout title="Add New Plant">

    <div class="max-w-md mx-auto bg-[#C2DEC1] rounded-xl shadow-lg p-6 mt-10">
        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-[#295334] mb-6">
            Add a New Plant
        </h1>

        <!-- Add Plant Form -->
        <form action="/plants" method="POST" class="space-y-4">
            @csrf

            <!-- Plant Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">
                    Plant Name
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                />
            </div>

            <!-- Date Planted -->
            <div>
                <label for="date_planted" class="block text-gray-700 font-semibold mb-1">
                    Date Planted
                </label>
                <input
                    type="date"
                    id="date_planted"
                    name="date_planted"
                    value="{{ old('date_planted') }}"
                    class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                />
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-gray-700 font-semibold mb-1">
                    Category
                </label>
                <select
                    id="category_id"
                    name="category_id"
                    required
                    class="w-full border border-[#16312B] rounded px-3 py-2 bg-[#C2DEC1] focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                >
                    <option value="">Select a category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Watering Frequency -->
            <div>
                <label for="watering_frequency" class="block text-gray-700 font-semibold mb-1">
                    Watering Frequency (days)
                </label>
                <input
                    type="text"
                    id="watering_frequency"
                    name="watering_frequency"
                    value="{{ old('watering_frequency') }}"
                    class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                />
            </div>

            <!-- Submit Button -->
            <div class="text-center pt-2">
                <button type="submit" class="bg-[#295334] text-white px-5 py-2 rounded-xl hover:bg-[#24533f] transition-colors duration-150 mt-2">
                    Save the Plant
                </button>
            </div>
        </form>
    </div>

</x-layout>
