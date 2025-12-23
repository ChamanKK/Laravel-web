<x-layout title="{{ isset($journal) ? 'Edit' : 'Add' }} Journal Entry">

    <div class="max-w-md mx-auto bg-[#C2DEC1] rounded-xl shadow-lg p-6 mt-10">

        <h1 class="text-2xl font-bold text-center text-[#295334] mb-6">
            {{ isset($journal) ? 'Edit' : 'Add' }} Journal Entry for {{ $plant->name }}
        </h1>

        <form action="{{ isset($journal) ? route('journals.update', $journal->id) : url('/plants/'.$plant->id.'/journals') }}" 
              method="POST" class="space-y-4">
            @csrf
            @if(isset($journal))
                @method('PATCH')
            @endif

            <!-- Date -->
            <div>
                <label for="date" class="block text-gray-700 font-semibold mb-1">Date:</label>
                <input type="date" id="date" name="date"
                       value="{{ old('date', isset($journal->date) ? $journal->date->format('Y-m-d') : '') }}"
                       class="w-full border border-[#16312B] rounded px-3 py-2">
                @error('date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Height -->
            <div>
                <label for="height" class="block text-gray-700 font-semibold mb-1">Height:</label>
                <input type="text" id="height" name="height"
                       value="{{ old('height', $journal->height ?? '') }}"
                       placeholder="e.g., 10 cm"
                       class="w-full border border-[#16312B] rounded px-3 py-2">
                @error('height')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Health Status -->
            <div>
                <label for="health_status" class="block text-gray-700 font-semibold mb-1">Health Status:</label>
                <input type="text" id="health_status" name="health_status"
                       value="{{ old('health_status', $journal->health_status ?? '') }}"
                       placeholder="e.g., Good, Very Good"
                       class="w-full border border-[#16312B] rounded px-3 py-2">
                @error('health_status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-gray-700 font-semibold mb-1">Notes:</label>
                <textarea id="notes" name="notes" rows="3"
                          class="w-full border border-[#16312B] rounded px-3 py-2">{{ old('notes', $journal->notes ?? '') }}</textarea>
                @error('notes')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 transition">
                    {{ isset($journal) ? 'Update Entry' : 'Add Entry' }}
                </button>
            </div>
        </form>
    </div>

</x-layout>
